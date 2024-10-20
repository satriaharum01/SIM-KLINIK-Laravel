@extends('template.master')
@section('content')
<!-- awal isi halaman -->
<div class="app-title">
  <div>
    <h1><i class="bi bi-table"></i> {{$title}}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
    <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="border-bottom d-flex justify-content-end mb-3 pb-2 tile-body">
        <button type="button" class="btn btn-primary btn-add pull-right">
          <i class="fa fa-plus"></i> Tambah Data
        </button>
      </div>
      <div class="tile-body">
        <div class="table-responsive">
          <table
            class="table table-hover table-bordered"
            id="data-width"
            width="100%"
          >
            <thead>
              <tr>
                <th style="text-align: center" width="10%">No</th>
                <th>Waktu</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Status</th>
                <th style="text-align: center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- akhir isi halaman -->
@endsection

@section('custom_script')
<script>
  $(function () {
    table = $("#data-width").DataTable({
      searching: false,
      ajax: '{{ url("$page/json") }}',
      columns: [
        {
          data: "DT_RowIndex",
          name: "DT_RowIndex",
          className: "text-center",
        },
        {
          data: "waktu",
          className: "text-center",
        },
        {
          data: "pasien",
          className: "text-center",
        },
        {
          data: "dokter",
          className: "text-center",
        },
        {
          data: "status",
          className: "text-center",
        },
        {
          data: "id",
          className: "text-center",
          orderable: false,
          searchable: false,
          render: function (data, type, row) {
            return (
              '<button type="button" class="btn btn-success btn-edit" data-id="' +
              data +
              '"><i class="fa fa-edit"></i> </button>\
                        <a class="btn btn-danger btn-hapus" data-id="' +
              data +
              '" data-handler="data" href="delete/' +
              data +
              '">\
                        <i class="fa fa-trash"></i> </a> \
					              <form id="delete-form-' +
              data +
              '-data" action="{{ url ($page) }}delete/' +
              data +
              '" method="GET" style="display: none;">\
                        </form>'
            );
          },
        },
      ],
    });
  });

  //Button Trigger
  $("body").on("click", ".btn-add", function () {
    kosongkan();
    jQuery("#compose-form").attr("action", "{% url 'data' %}save");
    jQuery("#compose .modal-title").html("Tambah {{$title}}");
    jQuery("#compose").modal("toggle");
  });

  $("body").on("click", ".btn-edit", function () {
    var id = jQuery(this).attr("data-id");

    $.ajax({
      url: "find/" + id,
      type: "GET",
      cache: false,
      dataType: "json",
      success: function (dataResult) {
        console.log(dataResult);
        var resultData = dataResult.data;
        $.each(resultData, function (index, row) {
          jQuery("#compose-form input[name=periode]").val(row.periode);
          jQuery("#compose-form input[name=jumlah]").val(row.jumlah);
          jQuery("#compose-form input[name=ekspor]").val(row.ekspor);
        });
      },
    });
    jQuery("#compose-form").attr("action", '{{ url($page)}}update/' + id);
    jQuery("#compose .modal-title").html("Update {{$title}}");
    jQuery("#compose").modal("toggle");
  });

  $("body").on("click", ".btn-simpan", function () {
    Swal.fire("Data Disimpan!", "", "success");
  });

  function kosongkan() {
    jQuery("#compose-form input[name=periode]").val("");
    jQuery("#compose-form input[name=jumlah]").val("");
    jQuery("#compose-form input[name=ekspor]").val("");
  }
</script>
@endsection