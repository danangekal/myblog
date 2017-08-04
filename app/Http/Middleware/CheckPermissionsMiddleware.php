<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get currents user
        $currentUser = $request->user();
        // get current action name
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);
        
        $crudPermissionsMap = [
            // 'create' => ['create', 'store'],
            // 'update' => ['edit', 'update'],
            // 'delete' => ['destroy', 'restore', 'forceDestroy'],
            // 'read'   => ['index', 'view']
            'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
        ];
        
        $classesMap = [
            'Blog'          => 'post',
            'Categories'    => 'category',
            'Users'         => 'user'
        ];

        foreach ($crudPermissionsMap as $permission => $methods) {
            // if the current method exist in method list
            // we'll check the permission
            if (in_array($method, $methods) && isset($classesMap[$controller])){
                $classesName = $classesMap[$controller];

                if ($classesName == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])){
                    // if the current user has not update-others-post/delete-others-post permission
                    // make sure he/she only modify his/her own post
                    if ( ($id=$request->route('blog')) && (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post')) ) {
                        $post = \App\Post::find($id);

                        if ($post->author_id !== $currentUser->id) {
                            abort(403, "Forbidden Access!");                    
                        }
                    }
                }

                // if the user has not permission don't allow next request
                elseif (!$currentUser->can("{$permission}-{$classesName}")){
                    abort(403, "Forbidden Access!");
                } 

                break;
            }
        }

        return $next($request);
    }
}
