<script>
    $(document).ready(function() {
        var uri = "\/";
        var template = $.templates("#tmpl");

        $('table#spf').DataTable({
            processing: true,
            serverSide: true,
            searchDelay: 1500,
            pageLength: 10,
            searching: true,
            info: true,
            language: {
                searchPlaceholder: "Ketik nama instansi"
            },
            scrollX: true,
            ajax: {
                url: uri + 'periode/list',
                method: 'GET',
                data: function (d) {
                    return $.extend({}, d, {});
                },
                dataSrc: function (response) {
                    var data = response.data;
                    var all = [];
                    for (var i = 0; i < data.length; i++) {
                        var row = {
                            rows: response.start + i + 1,
                            validFrom: data[i].validFrom,
                            validTo: data[i].validTo,
                            instansi: data[i].nama,
                            jenis_pengadaan: data[i].jenisPengadaan,
                            mulai: data[i].startDate,
                            selesai: data[i].endDate,
                            status: data[i].isBuka,
                            link_pengumuman_formasi: data[i].linkPengumumanFormasi
                        };

                        all.push(row);
                    }

                    return all;
                }
            },
            columns: [
                // { "data": "rows" },
                { "data": "status" },
                { "data": "instansi" },
                { "data": "jenis_pengadaan" },
                {
                    data: "mulai",
                    render: function(data, type, row, meta) {
                        var options = {
                            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                            hour: 'numeric', minute: 'numeric'
                        };

                        if (data != null && data != "") {
                            date = new Date(data);
                            return date.toLocaleString("id-ID", options);
                        } else {
                            return "";
                        }
                    }
                },
                {
                    data: "selesai",
                    render: function(data, type, row, meta) {
                        var options = {
                            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                            hour: 'numeric', minute: 'numeric'
                        };

                        if (data != null && data != "") {
                            date = new Date(data);
                            return date.toLocaleString("id-ID", options);
                        } else {
                            return "";
                        }
                    }
                },
                {
                    data: "link_pengumuman_formasi",
                    render: function(data, type, row, meta) {
                        if (data != null && data != "") {
                            return type === 'display' ?
                                '<a class=\'btn btn-primary btn-sm\' href=\'' + data + '\' target=\'_blank\'> Pengumuman </a>' : data;
                        } else {
                            return "";
                        }
                    }
                }
            ]
        });

    });

</script>
