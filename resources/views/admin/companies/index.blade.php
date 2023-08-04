@extends('admin.template')

@section('title', '企業一覧')

@section('header_title', '企業一覧')

@section('main')
    <div class="w-full mx-auto ">
        <table class="w-full table-fixed border-collapse border border-slate-400">
            <thead class="w-full">
            <tr>
                <th class="w-1/6 border border-slate-500 bg-slate-300">ID</th>
                <th class="w-5/6 border border-slate-500 bg-slate-300 text-left px-3">企業名</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td class="border border-slate-500 text-center">{{ $company->id }}</td>
                    <td class="border border-slate-500 px-3">{{ $company->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
