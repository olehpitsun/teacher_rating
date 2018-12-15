<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\TaskTransformer;


class TaskController extends Controller
{

    protected $respose;


    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        //Get all taskcomposer require ellipsesynergie/api-response

        $tasks = News::paginate(15);
        // Return a collection of $task with pagination
        return $this->response->withPaginator($tasks, new  TaskTransformer());
    }

    public function show($id)
    {
        //Get the task
        $task = News::find($id);
        if (!$task) {
            return $this->response->errorNotFound('Task Not Found');
        }
        // Return a single task
        return $this->response->withItem($task, new  TaskTransformer());
    }

    public function destroy($id)
    {
        //Get the task
        $task = News::find($id);
        if (!$task) {
            return $this->response->errorNotFound('Task Not Found');
        }

        if($task->delete()) {
            return $this->response->withItem($task, new  TaskTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete a task');
        }

    }


    public function store(Request $request)  {
        if ($request->isMethod('put')) {
            //Get the task
            $task = News::find($request->id);
            if (!$task) {
                return $this->response->errorNotFound('Task Not Found');
            }
        } else {
            $task = new News;
        }

        $task->id = $request->input('id');
        $task->text = $request->input('text');
        $task->title = $request->input('title');
        $task->img = $request->input('articles');
        $task->href = $request->input('href');
        //$task->user_id =  1; //$request->user()->id;

        if($task->save()) {
            return $this->response->withItem($task, new  TaskTransformer());
        } else {
            return $this->response->errorInternalError('Could not updated/created a task');
        }

    }


}
