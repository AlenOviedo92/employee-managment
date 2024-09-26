<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeesController extends Controller
{
    // 1. index: para mostrar todos los employees
    public function index() {
        $employees = Employee::all();
        $departments = Department::all();
        return view('employees.allEmployees', ['employees' => $employees, 'departments' => $departments ]);
    }

    // 2. store: para guardar en la DB un employee
    public function store(Request $request) {                                               // Como parámetro se recibe una request HTTP que se genera al hacer click en el form de crear nuevo empleado 
        $request->validate([                                                                // validate es un método que me permite validar los campos recibidos
            'name' => "required|min:3",                                                     // El campo name es obligatorio y debe tener mínimo 3 caracteres
            'email' => "required|email|unique:employees,email", 
            'puesto' => "required|min:3", 
            'salario' => "required|numeric|min:0|max:999999999",
            'fecha' => "required|date",
            'department_id' => "required"
        ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->puesto = $request->puesto;
        $employee->salario = $request->salario;
        $employee->fecha = $request->fecha;
        $employee->department_id = $request->department_id;

        $employee->save();                                                                       // save: método que tienen todos los modelos para guardar un nuevo elemento en la DB
        return redirect()->route('employees')->with('success', 'Empleado creado correctamente'); // redirect: redirije al usuario a la ruta "employees" y el método with sirve para enviar el msj 'Empleado creado correctamente'
    }

    // 3. show: para mostrar el formulario de edición
    public function show($id) {
        $employee = Employee::find($id);
        return view('employees.show', ['employee' => $employee ]);
    }

    // 4. update: para actualizar un employee
    public function update(Request $request, $id) {
        $request->validate([
            'name' => "required|min:3",
            'email' => "required|email|unique:employees,email,$id", // Asegúrate de que el correo sea único, excepto para el empleado que estás editando
            'puesto' => "required|min:3",
            'salario' => "required|numeric",
            'fecha' => "required|date"
        ]);
    
        $employee = Employee::findOrFail($id);  // Busca el empleado por id, o lanza una excepción si no lo encuentra
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->puesto = $request->puesto;
        $employee->salario = $request->salario;
        $employee->fecha = $request->fecha;
    
        $employee->save();  // Guarda los cambios en la base de datos
    
        return redirect()->route('employees')->with('success', 'Empleado actualizado correctamente');
    }    

    // 5. destroy: para eliminar un employee
    public function destroy($id) {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employees')->with('success', 'Empleado eliminado');
    }

    // 6. create: para mostrar el formulario de creación de empleados
    public function create() {
        $employees = Employee::all();
        $departments = Department::all();
        return view('employees.index', ['employees' => $employees, 'departments' => $departments ]);                       // La vista del formulario es 'index.blade.php'
    }
}