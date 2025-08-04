@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Cấu hình banner
@endsection

@section('page_title')
    Cấu hình banner
@endsection


@section('content')
<div ng-controller="Config" ng-cloak>
  @include('admin.contact_banner.form')
</div>
@endsection
@section('script')
@include('admin.contact_banner.ContactBanner')
<script>
  app.controller('Config', function ($scope, $http, $timeout) {
    $scope.form = new ContactBanner(@json($object), {scope: $scope});
    $scope.loading = {};
      console.log($scope.form.blocks);
      @include('admin.contact_banner.formJs')

      $scope.submit = function() {
      $scope.loading.submit = true;

      $.ajax({
        type: 'POST',
        url: "{!! route('contactPages.update') !!}",
        headers: {
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        data: $scope.form.submit_data,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            toastr.success(response.message);
            location.reload;
          } else {
            toastr.warning(response.message);
            $scope.errors = response.errors;
            location.reload;
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
  });
</script>
@endsection
