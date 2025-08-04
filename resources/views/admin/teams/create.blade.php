@extends('layouts.main')

@section('title')
    Thêm mới thành viên
@endsection

@section('page_title')
    Thêm mới thành viên
@endsection



@section('content')
    <div ng-controller="Team" ng-cloak>
        @include('admin.teams.form_')
    </div>
@endsection
@section('script')

    @include('admin.teams.Team')
    <script>
        app.controller('Team', function ($scope, $http) {
            $scope.form = new Team({}, {scope: $scope});
            $scope.loading = {}

            $scope.submit = function() {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                data.append('type', $scope.type);
                $.ajax({
                    type: 'POST',
                    url: "{{route('teams.store')}}",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('teams.index') }}";
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }

            @include('admin.teams.formJs');

        });
    </script>
@endsection
