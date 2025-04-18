<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeAlert extends Component
{
    public $employeeId;

    public function render()
    {
        return view('livewire.employee-alert');
    }

    public function destroy($employeeId)
    {
        Employee::find($employeeId)->delete();

        return redirect()->route('employees.index');
    }
}
