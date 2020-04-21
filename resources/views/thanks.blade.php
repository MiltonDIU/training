<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 7/14/2019
 * Time: 11:13 AM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="card col-md-12 shadow-sm">
                <div class="card-body">
                    <p>
                        Dear Applicant,<br>
                        Thank you very much for your application. Our experts will contact you soon.<br>
                        Please feel free to contact us<br>
                        Cell: +8801713493159, +8801847140089<br>
                        Phone: +88029123634<br>
                        Email: contact@skill.jobs<br>
                    </p>
                    <p><a href="{{$url}}">Back</a>  </p>
                </div>
            </div>
        </div>
    </div>
@endsection

