<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 07.11.17
 * Time: 15:26
 */

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract {

    public function transform($task) {
        return [
            'id' => $task->id,
            'name' => $task->text,
            'title' => $task->title,
            'articles' => $task->img,
            'href' => $task->href,
        ];
    }
}
