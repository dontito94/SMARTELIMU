<style>
    .uppercase {
        text-transform: uppercase;
    }
</style>


{!! Html::style(url('vendor/sweetalert/sweetalert.css')) !!}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
<style>
    body{margin:40px;}

    .stepwizard-step p {
        margin-top: 10px;
    }

    .process-row {
        display: table-row;
    }

    .process {
        display: table;
        width: 100%;
        position: relative;
    }

    .process-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .process-row:before {
        top: 50px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .process-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .process-step p {
        margin-top:10px;

    }

    .btn-circle {
        width: 100px;
        height: 100px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>