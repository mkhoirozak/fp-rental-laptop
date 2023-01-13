
// notiflix notif
const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {

    Notiflix.Notify.Init({
        width: "200px",
        position: "left-bottom",
        fontSize: "15px",
        cssAnimationStyle: "from-bottom",
        cssAnimationDuration: 500,
        success: {
            background: "#00796b",
        },
    });
    Notiflix.Notify.Success('Data berhasil ' + flashdata);
}

const flashdata2 = $('.flash-data-fail').data('flashdata-fail');

if (flashdata2) {

    Notiflix.Notify.Init({
        position: "left-bottom",
        fontSize: "17px",
        cssAnimationStyle: "from-bottom",
        cssAnimationDuration: 500,
        failure: {
            background: "#d32f2f",
        },
    });
    Notiflix.Notify.Failure(flashdata2);
}

//tombol confirm
$('.tombol-confirm').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Notiflix.Confirm.Init({
        position: "center-top",
        backgroundColor: "#d5eeec",
        titleColor: "#0f1110",
        okButtonBackground: "#00796b",
        cancelButtonBackground: "#c87474",
    });

    Notiflix.Confirm.Show
        ('Confirm',
            'Apakah anda yakin??',
            'Iya',
            'Tidak',
            function () {
                document.location.href = href;
            },

            function () {
                Notiflix.Notify.Init({
                    width: "150px",
                    position: "left-bottom",
                    fontSize: "15px",
                    cssAnimationStyle: "from-bottom",
                    cssAnimationDuration: 500,
                    failure: {
                        background: "#d32f2f",
                    },
                });
                Notiflix.Notify.Failure('Batal');
            });
});

//tombol report
$('.tombol-report').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Notiflix.Report.Init({
        fontFamily: "Quicksand",
        useGoogleFont: true,
        failure: { svgColor: "#ff5d51", },
    });

    Notiflix.Report.Failure(
        'Anda harus login terlebih dahulu',
        ' ',
        'Login',
        function () {
            document.location.href = href;
        },
        {
            width: '360px',
            svgSize: '120px',
        },
    );
});
