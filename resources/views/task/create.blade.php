@extends('layout.main')

@section('title')Создание задачи к сделке "{{ $deal_name }}"@endsection

@section('content')
    <form action="{{ route('deal.task.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="Owner" class="form-label">Ответственный за задачу</label>
                    <input type="text" class="form-control" id="Owner" name="Owner" value="{{ $user->getFullName() }}">
                </div>
                <div class="mb-3">
                    <label for="Subject" class="form-label">Тема</label>
                    <input type="text" class="form-control" id="Subject" name="Subject" required>
                </div>
                <div class="form-group mb-3">
                    <label for="Due_Date" class="form-label">Срок</label>
                    <input type="date" class="form-control" id="Due_Date" name="Due_Date">
                </div>
                <div class="mb-3">
                    <label for="Who_Id" class="form-label">Контакт</label>
                    <select class="form-select" id="Who_Id" name="Who_Id" required>
                        <option value="{{ $who_id->getEntityId() }}" selected>{{ $who_id->getLookupLabel() }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="What_Id" class="form-label">Тип</label>
                    <select class="form-select" id="What_Id" name="What_Id" required>
                        <option value="{{ $deal_id }}" selected>{{ $deal_name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Status" class="form-label">Статус</label>
                    <select class="form-select" id="Status" name="Status" required>
                        <option selected value="Not Started">Not Started</option>
                        <option value="Deffered">Deffered</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                        <option value="Waiting for input">Waiting for input</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Priority" class="form-label">Приоритет</label>
                    <select class="form-select" id="Priority" name="Priority" required>
                        <option selected value="High">High</option>
                        <option value="Highest">Highest</option>
                        <option value="Low">Low</option>
                        <option value="Lowest">Lowest</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Описание</label>
                    <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection
