<?php

class Countries extends Controller
{
    //properties
    private $richestModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->richestModel = $this->model('RichestPeople');
    }

    public function index($land = 'Nederland', $age = 67)
    {
        $records = $this->richestModel->getPeople();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Name</td>
                        <td>$items->NettoWorth</td>
                        <td>$items->Age</td>
                        <td>$items->Company</td>
                      </tr>";
        }

        $data = [
            'title' => "RichestPeople",
            'rows' => $rows
        ];
        $this->view('RichestPeople/index', $data);
    }
}
