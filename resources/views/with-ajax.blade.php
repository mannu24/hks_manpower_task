<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tree View</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    ul,
    #myUL {
        list-style-type: none;
    }

    #myUL {
        margin: 0;
        padding: 0;
    }

    .caret {
        cursor: pointer;
        -webkit-user-select: none;
        /* Safari 3.1+ */
        -moz-user-select: none;
        /* Firefox 2+ */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    .caret-down::before {
        -ms-transform: rotate(90deg);
        /* IE 9 */
        -webkit-transform: rotate(90deg);
        /* Safari */

        transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }
    </style>
    <script>

    </script>
</head>

<body class="container">
    <header>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Complete Tree</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/with-ajax">With Ajax Load</a>
            </li>

        </ul>
    </header>
    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Tree View</h3>
        </div>
        <div class="col-12 p-3">
            <div class="card">
                <div class="card-header">
                    Add New
                </div>
                <div class="card-body">
                    <form method="POST" id="submit-form" class="mt-4">
                        <div class="row">

                            <div class="form-group col-4">
                                <input required type="text" required name="name" placeholder="Enter Task Title"
                                    class="form-control" id="name">
                            </div>
                            <div class="form-group col-4">
                                <select required class="form-control" name="parent_entry_id" id="parent_id">
                                    <option value="" selected disabled>--Select--</option>
                                    <option value="0">AT ROOT</option>
                                    @foreach($entries as $e)
                                    <option value="{{$e->entry_id}}"> {{$e->details->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <button type="submit" class="btn btn-success">Add to List</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    Tree View Of Entry Points
                    <a href="/">Refresh</a>
                </div>
                <div class="card-body">
                    <div id="tree">
                        <ul id="myUL">
                            @foreach($parents as $p)
                            <li>
                                <span class="caret" data-id="{{ $p->entry_id }}">{{ $p->details->name }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.caret',function(){
            if($(this).hasClass('caret-down')){
                $(this).removeClass('caret-down');
                $(this).parent().children('ul').empty();
            }
            else{

            let span = $(this);
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: '/fetch-branch/'+id,
                type: 'GET',
                success: function(data) {
                    console.log(span);
                    span.parent().append(data.tree)
                    span.addClass('caret-down')

                }
            });
        }

        });

        $('#submit-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/entry/add',
                type: 'POST',
                data: formData,
                success: function(data) {
                    if (data.status == true) {
                        $('#submit-form')[0].reset()

                        alert("Node Added");
                    } else {
                        alert('Something Went Wrong');
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });


    });
    </script>
</body>

</html>