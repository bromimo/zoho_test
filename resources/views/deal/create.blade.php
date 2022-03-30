@extends('layout.main')

@section('title')Создание новой сделки@endsection

@section('content')
    <form action="{{ route('deal.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="Owner" class="form-label">Ответственный</label>
                    <input type="text" class="form-control" id="Owner" name="Owner" value="{{ $user->getFullName() }}">
                </div>
                <div class="mb-3">
                    <label for="Deal_Name" class="form-label">Название сделки</label>
                    <input type="text" class="form-control" id="Deal_Name" name="Deal_Name" required>
                </div>
                <div class="mb-3">
                    <label for="Account_Name" class="form-label">Контрагент</label>
                    <select class="form-select" id="Account_Name" name="Account_Name" required>
                        @foreach($accounts as $key => $account)
                            <option
                                @if($key === 0)
                                selected
                                @endif
                                value="{{ $account->getEntityId() }}">{{ $account->getFieldValue('Account_Name') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Type" class="form-label">Тип</label>
                    <select class="form-select" id="Type" name="Type" required>
                        <option selected>-Не выбрано-</option>
                        <option value="Existing Business">Existing Business</option>
                        <option value="New Business">New Business</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="Amount" class="form-label">Сумма</label>
                    <input type="text" class="form-control" id="Amount" name="Amount" required>
                </div>
                <div class="form-group mb-3">
                    <label for="Closing_Date" class="form-label">Введите дату:</label>
                    <input type="date" class="form-control" id="Closing_Date" name="Closing_Date">
                </div>
                <div class="mb-3">
                    <label for="Stage" class="form-label">Стадия</label>
                    <select class="form-select" id="Stage" name="Stage" required>
                        <option value="Qualification" selected>Qualification</option>
                        <option value="Needs Analysis">Needs Analysis</option>
                        <option value="Value Proposition">Value Proposition</option>
                        <option value="Identify Decision Makers">Identify Decision Makers</option>
                        <option value="Proposal/Price Quote">Proposal/Price Quote</option>
                        <option value="Negotiation/Review">Negotiation/Review</option>
                        <option value="Closed Won">Closed Won</option>
                        <option value="Closed Lost">Closed Lost</option>
                        <option value="Closed-Lost to Competition">Closed-Lost to Competition</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Probability" class="form-label">Вероятность(%)</label>
                    <input type="text" class="form-control" id="Probability" name="Probability" value="10" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="Description" class="form-label">Описание</label>
                <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection
