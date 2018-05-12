@extends('layouts.app')
<style>
    img {
        width: 100px;
        height: 120px;
    }
</style>
@section('content')

    <div class="container" id="app_test">
        <list_question_template ></list_question_template>
    </div>

    <template id="list_question">

        <div>
            {{ Form::open(['url' => '', 'method' => 'get', @submit=]) }}
            {{ Form::submit('新增任务',['class' => 'btn btn-success btn-block'] ) }}

            {{ Form::close() }}

            <ul class="list-group">
                <li class="list-group-item" v-for="question in question_lists"> @{{ question.name }}
                    <strong @click="deleteItem(question)" style="color:red">x</strong>
                </li>
            </ul>
        </div>

    </template>

    <script>
        Vue.component('list_question_template', {
            template : '#list_question',
            // props : ['question_lists'],
            data : function(){
                return {
                    question_lists : {}
                }
            },
            created : function () {
                var vm = this;
                var url = '/api/test';
                $.getJSON(url).done(function(response){
                    vm.question_lists = response;
                });
            },
            methods : {
                deleteItem : function (question) {
                    var index = this.question_lists.indexOf(question);
                    this.question_lists.splice(index, 1)
                }
            }
        });

        new Vue({
            el: '#app_test'
        });
    </script>
@endsection