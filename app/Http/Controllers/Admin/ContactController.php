<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // public function show(Request $request, $id=false) {
    //     $array = array(
    //         'title'=>'Laravel Project',
    //         'data'=>[
    //             'one'=>'List 1',
    //             'two'=>'List 2',
    //             'three'=>'List 3',
    //             'four'=>'List 4',
    //             'five'=>'List 5'
    //         ],
    //         'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
    //         'bvar'=>true,
    //         'script'=>'<script>alert("hello")</script>'
    //     );

    //     // print_r($request->All());
    //     // print_r($request->only('name')); // добавляет в массива введенные данные
    //     // print_r($request->except('name')); // убирает из массива введенные данные
    //     // print_r($request->except(['name'])) // можно передавать массив данных
    //     // echo $request->input('name', '123');
    //     // echo $request->name;
    //     // if($request->has('name')){ // проверяет наличие определенных данных и она не пуста
    //         // echo $request->input('name', '123');
    //     // }
    //     // echo $request->query('id'); // показывает данные с запроса типа get   

    //     // echo $request->path(); // показывает uri адресной строки
    //     // echo $request->url(); // показывает url адресной строки
    //     // echo $request->fullUrl();
    //     // echo $request->method(); // показывает тип зароса (либо get, либо POST и т.д.) 

    //     // if($request->is('contact/*')){} // проверяет url на соответсвие. * <- это озночает любые данные
    //     // if($request->isMethod('post')){} // проверяет зарос соответсвует ли он типу POST 

    //     // $request->flash(); // Для сохранения всех отпрвленных данных в сессии
    //     // $request->flashOnly('name', 'site'); // Для сохранения определенных отпрвленных данных в сессии 
    //     // $request->flashExcept('name', 'site'); // Для не сохранения определенных отпрвленных данных 
    //     // $request->flush(); // Полностью очищает данные сессии
    //     // $request->old('name'); // Показывает данные из сохраненной сессии

    //     // echo $request->server(); // Суперглобалные данные
    //     // echo $request->segments(); // Показывает на какие сегменты будет разделен запрос    

    //     return view('layout.contact', $array);
    // }
    
    // 25 lesson
    // public function show(Request $request, $id=false) {
    //     $array = array(
    //         'title'=>'Laravel Project',
    //         'data'=>[
    //             'one'=>'List 1',
    //             'two'=>'List 2',
    //             'three'=>'List 3',
    //             'four'=>'List 4',
    //             'five'=>'List 5'
    //         ],
    //         'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
    //         'bvar'=>true,
    //         'script'=>'<script>alert("hello")</script>'
    //     );

    //     if($request->isMethod('post')){
    //         $rules = [
    //             // 'name'=>'required|max:10',
    //             'email'=>'required|email',
    //         ];
    //         $this->validate($request, $rules);
    //         dump($request->all());

    //         // $validator->errors()->all();
    //     }

    //     return view('layout.contact', $array);
    // }

    // 26 lesson begin
    // public function store(ContactRequest $request, $id=false) {
    //     $array = array(
    //         'title'=>'Laravel Project',
    //         'data'=>[
    //             'one'=>'List 1',
    //             'two'=>'List 2',
    //             'three'=>'List 3',
    //             'four'=>'List 4',
    //             'five'=>'List 5'
    //         ],
    //         'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
    //         'bvar'=>true,
    //         'script'=>'<script>alert("hello")</script>'
    //     );

    //     return view('layout.contact', $array);
    // }

    // public function show() {
    //     $array = array(
    //         'title'=>'Laravel Project',
    //         'data'=>[
    //             'one'=>'List 1',
    //             'two'=>'List 2',
    //             'three'=>'List 3',
    //             'four'=>'List 4',
    //             'five'=>'List 5'
    //         ],
    //         'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
    //         'bvar'=>true,
    //         'script'=>'<script>alert("hello")</script>'
    //     );

    //     return view('layout.contact', $array);
    // }
    // 26 lesson end

    // 27 lesson
    public function store(Request $request, $id=false) {
        $array = array(
            'title'=>'Laravel Project',
            'data'=>[
                'one'=>'List 1',
                'two'=>'List 2',
                'three'=>'List 3',
                'four'=>'List 4',
                'five'=>'List 5'
            ],
            'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
            'bvar'=>true,
            'script'=>'<script>alert("hello")</script>'
        );

        if($request->isMethod('post')){
            $message = [
                'name.required'=>'ПОЛЕ :attribute обязательно к заполнению',
                'email.max'=>'maxxxxsimum'
            ];
            $validator = Validator::make($request->all(), [
                'name'=>'required',
                // 'email'=>'required'
            ], $message);

            $validator->sometimes('email','required',function($input){
                return strlen($input->name) >= 10;
            });

            // $validator->after(function($validator){
            //     $validator->errors()->add('name','дополнительное сообщение');
            // });

            if($validator->fails()){
                $messages = $validator->errors();

                // dump($validator->failed());
                
                // $messages->get('name');
                // $messages->first('name');
                // $messages->has('name');
                // $messages->all('<p> :message </p>');

                return redirect()->route('contact')->withErrors($validator)->withInput();
            }
        }

        // $this->validate($request, $rules);
        // dump($request->all());
        // $validator->errors()->all();

        return view('layout.contact', $array);
    }

    public function show() {
        $array = array(
            'title'=>'Laravel Project',
            'data'=>[
                'one'=>'List 1',
                'two'=>'List 2',
                'three'=>'List 3',
                'four'=>'List 4',
                'five'=>'List 5'
            ],
            'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
            'bvar'=>true,
            'script'=>'<script>alert("hello")</script>'
        );

        return view('layout.contact', $array);
    }
}
