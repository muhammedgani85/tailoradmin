@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Customers" />
    <div class="space-y-6">

        <x-common.component-card title="Customer List">
            <x-tables.basic-tables.basic-tables-three />
        </x-common.component-card>

    </div>
@endsection
