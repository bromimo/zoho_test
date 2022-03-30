@extends('layout.main')

@section('title'){{ config('app.name') }}@endsection

@section('content')
    <div class="row">
        <div class="col">
            {{ $user->getFullName() }}, добро пожаловать в {{ config('app.name') }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Сделка</th>
                    <th scope="col">Контрагент</th>
                    <th scope="col">Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deals as $i => $deal)
                    @if($i < config('zoho.deals_page'))
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $deal->getFieldValue('Deal_Name') }}</td>
                        <td>@if($deal->getFieldValue('Account_Name'))
                                {{ $deal->getFieldValue('Account_Name')->getLookupLabel() }}
                            @endif</td>
                        <td>{{ $deal->getFieldValue('Amount') }}</td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <a class="btn btn-outline-primary" href="{{ route('deal.create') }}">Создать сделку</a>
        </div>
    </div>
@endsection
