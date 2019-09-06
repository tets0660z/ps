<?php
namespace App\Imports;

use App\Instructor;
use App\Classlist;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMappedCells;
class UsersImport implements ToCollection,WithMappedCells
{
    public function mapping(): array
    {
        return [
            'name'  => 'C7',
            'sections' => 'C3',
        ];
    }
    // public function model(array $row)
    // {
    //     return new User([
    //         'name' => $row['name'],
    //         'email' => $row['email'],
    //     ]);
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Instructor::create([
                'name' => $row['name'],
            ]);

            Classlist::create([
                'sections' => $row[1],
            ]);
        }
    }
}
