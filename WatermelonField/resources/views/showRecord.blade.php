@extends('layouts.master')
@section('title', 'Watermelon yield analysis')

@section('content')
<main id="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="recordCard">
                <div class="card-header" style="margin-bottom:30px">My analysis record</div>
                <p>
                Anticipated watermelon yield = {{$yield}}</p>
                <p> Anticipated market price = NTD$ {{$totalMin}} - {{$totalMax}}</p><br>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Amount</th>
                                <th>priceRange</th>
                                <th>Recognition time</th>
                                <th>ProcessTime</th>
                                <th>Finsh Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($recordData as $data)
                            <tr>
                                <td><img src="http://163.18.42.219:5000/pic/{{$data->picName}}" class="img-thumbnail" alt="Cinque Terre"></td>
                                <td>{{$data->count}}</td>
                                <td>{{$data->priceRange}}</td>
                                <td>{{$data->processTime}}</td>
                                <td>{{$data->totalTime}}</td>
                                <td>{{$data->createTime}}</td>
                            </tr>
                         @endforeach 
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection