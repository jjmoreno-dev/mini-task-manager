<table style='width:100%;border:1px solid black'>
    <thead>
        <tr style='border:1px solid black'>
            <th>Id</th>
            <th>Title</th>
            <th>completed</th>
            <th>category</th>
            
        </tr>
    </thead>
    <tbody>
        @if (count($tasks))
            @foreach ($tasks as $task)
                <tr style='border:1px solid black'>
                    <td style='border:1px solid black;text-align:center;'>{{ $task->id }}</td>
                    <td style='border:1px solid black;text-align:center;'> {{ $task->title }} </td>
                    <td style='border:1px solid black;text-align:center;'>
                    @if ($task->completed == 1)
                        <h4>Completed</h4>                        
                    @else
                        <h4>Pending</h4>
                    @endif                       
                    </td>
                    <td style='border:1px solid black;text-align:center;'> {{ $task->category->name }} </td>
               

                </tr>
            @endforeach
        @else
            <h4>Record Not Found</h4>
        @endif

    </tbody>
</table>
