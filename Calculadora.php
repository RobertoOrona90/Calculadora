<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Expires" content="0" />
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>AP - Asesoría Patrimonial</title><!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <style rel="stylesheet">

        .bg-cdr {
            background-color: rgb(17, 36, 105) !important
        }
		#tblAP > tbody > tr
        {
            font-size: 13px;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: rgb(250, 250, 250);
        }

        .card-img {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0
        }

        .swal2-confirm {
            text-decoration: none
        }

        .dtf-d-none {
            display: none
        }

        .table-contacto td,
        .table-contacto th {
            color: rgb(17, 36, 105) !important
        }

        .table-sm>:not(caption)>*>* {
            padding-top: 1px;
            padding-bottom: 1px
        }

        .text-color {
            color: black
        }

        .text-leyend {
            font-style: italic;
            font-size: 1.1em !important
        }

        .text-resumen {
            font-weight: 600;
            font-size: 14px;
            color: black;
        }

        .text-leyenda {
            color: black;
            font-weight: 600;
            font-size: 0.8rem
        }

        .text-justify {
            text-align: justify
        }

        .text-f-13 {
            font-size: 13px
        }

        .table-contacto td {
            font-weight: 700
        }

        .row-font {
            font-size: 16px;
            font-weight: 600;
            opacity: .9
        }

        p {
            margin: 0
        }

        [v-cloak] {
            display: none
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-sm-4" style="background-color:rgb(17,36,105)!important;">&nbsp;</div>
        <div class="col-sm-4" style="background-color:rgb(17,36,105)!important;">

            <a href="https://apasesoriapatrimonial.com.mx/">
                <center>
                    <img src="/assets/images/logoOficial.jpg" style="height:50%;width:38%;padding:3%;" alt="Logo">
                </center>
            </a>
        </div>
        <div class="col-sm-4" style="background-color:rgb(17,36,105)!important;">&nbsp;</div>
    </div>



    <div class="container mt-5" id="calcApp">
        <h1>Calculadora de ahorro</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <form class="form-content">
                            <table class="table table-borderless mb-3">
                                <tbody>
                                    <tr>
                                        <th width="32" class="text-end"><label for="inpNomb"
                                                class="form-label me-2">Nombre:</label></th>
                                        <td><input type="text" class="form-control" name="nombre" id="inpNomb"
                                                v-model="nombre" v-on:keyup="validForm()"></td>
                                    </tr>
                                    <tr>
                                        <th width="32" class="text-end"><label for="inpEdad"
                                                class="form-label me-2">Edad:</label></th>
                                        <td><input type="number" class="form-control" name="edad" id="inpEdad"
                                                v-model.number="edad" v-on:keyup="validForm()"></td>
                                    </tr>
                                    <tr>
                                        <th width="32" class="text-end"><label for="inpApor"
                                                class="form-label me-2">Aportación:</label></th>
                                        <td><input type="number" class="form-control" name="aportacion" id="inpApor"
                                                min="1999" v-model.number="aportacion" v-on:keyup="validForm()"></td>
                                    </tr>
                                    <tr>
                                        <th width="32" class="text-end"> &nbsp;
                                        </th>
                                        <td>
                                            <input type="checkbox" id="checkbox" v-model="inflacion">
                                            <label for="checkbox">Inflación</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mb-3 d-flex justify-content-end"><button type="button"
                                    class="btn btn-success me-2" v-on:click="calc()"
                                    v-bind:disabled="!seeButton">Calcular</button></div>
                        </form>
                        <div v-show="seeTable">
                            <div class="dtf-section mb-3">Con una aportación regular de <b>${{aportacion}}</b>, podrías
                                llegar a tener un patrimonio de <b>${{patrimonio}}</b> a los <b>65 años</b>. Equivalente
                                a una auto-pensión de <b>${{autopension}}</b> que podrías recibir mes a mes en tu edad de
                                jubilación.</div>
                            <div class="mb-3 d-flex justify-content-end"><a href="https://wa.link/otqdmc"
                                    target="_blank" class="btn btn-success col-12 text-white"><i
                                        class="fab fa-whatsapp"></i> Whatsapp</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-5">
                <div class="table-section" id="table-section">
                    <div class="dtf-header dtf-d-none">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <img src="/assets/images/logoPDF.png" width="150" class="dtf-img"
                                style="margin-left:40%;">

                            </div>
                            <div id="leyendaKiyosaki"  class="col-md-6 d-flex align-items-center justify-content-center">
                                <div  id="leyendaKiyosaki1" class="text-color text-leyend"><small class="text-justify">"Es importante tener el
                                        sueño de retirarte joven y rico pero para poder cumplirlo, necesitas tener un
                                        plan que construya el puente de el sueño a la realidad."</small>
                                    <p class="d-flex justify-content-start"><small>Robert Kiyosaki.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="dtf-section mb-3 text-resumen text-justify text-color">Apreciable <b>{{nombre}}</b> con una aportación regular de
                            <b>${{aportacion}}</b>, podrías llegar a tener un patrimonio de <b>${{patrimonio}}</b> a los
                            <b>65 años</b>. Equivalente a una auto-pensión de <b>${{autopension}}</b> que podrías recibir
                            mes a mes en tu edad de jubilación.
                        </div>
                    </div>
                    <table id="tblAP" class="table table-sm table-striped text-center dtf-table text-f-13">
                        <thead class="bg-cdr text-white">
                            <tr>
                                <th>Aportación Del Cliente</th>
                                <th>Año</th>
                                <th>Acumulado Aportación Del Cliente</th>
                                <th>Rendimiento Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-show="seeTable" v-for="(x, ix) in results"
                                v-bind:class="{'bg-cdr text-white row-font': ix == 4 || ix == 9 || ix == 14 || ix == 19 || ix == 24  || ix == 29 || ix == 34 }">
                                <td><span v-show="ix!=0" v-cloak>${{x.AportacionCliente | formatNumber}}</span></td>
                                <td class="text-center">Año <span v-cloak>{{ix+1}}</span></td>
                                <td><span v-cloak>${{x.aac | formatNumber}}</span></td>
                                <td><span v-cloak>${{x.rf | formatNumber}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="dtf-header dtf-d-none">
                        <div class="row">
                            <div class="dtf-section mb-3 text-leyenda text-justify text-color">*Rendimiento promedio
                                anual basado en el S&P500 de los ultimos 21 años.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script><!-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_es.min.js"
        integrity="sha512-Ou4GV0BYVfilQlKiSHUNrsoL1nznkcZ0ljccGeWYSaK2CaVzof2XaZ5VEm5/yE/2hkzjxZngQHVwNUiIRE8yLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script>
        console.log('aqui');
        console.log(screen.width);
        if (screen.width<610)
        {
            window.location.href = "https://apasesoriapatrimonial.com/CalculadoraMobile?w="+screen.width;
        }
        const isNum = (val) => {
            return typeof val === 'number' ? val : Number.isNaN(parseFloat(val)) ? 0 : parseFloat(val);
        };
        const formatNumber = (x) => {
            if (!isNum(x)) return '0.00';
            x = x.toFixed(2);
            return (x = x + '').replace(new RegExp('\\B(?=(\\d{3})+' + (~x.indexOf('.') ? '\\.' : '$') + ')', 'g'), ',');
        }
        Vue.filter('formatNumber', function (x) {
            return formatNumber(x);
        });
        new Vue({
            el: '#calcApp',
            data: {
                nombre: '',
                edad: 0,
                inflacion: false,
                aportacion: 0,
                anios: 32,
                results: [],
                totales: {
                    AportacionCliente: 0,
                    aac: 0,
                    rf: 0
                },
                imgF: 'data:image/jpeg;base64,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ZbC5v4Ybq5zkDZGzBjkggYHXigDoqKKa8uwEkNtUZJxQA6iozcIGYFgu1dxycYHrSG8Tdj67iSBs+ueaAJaKKKACiiigAooooAKKKKACiiigAooooAKKia8VWUc5ZS2Ojcex5/SpaACiiigAoopqyhh+OPrQA6ofsnJxtG7qAowfr3P505LhXHRh7EYOPXHWgXCk/wAXfnaccHFAElFFFABRRRQAUUVGbhRt+8wfkFQSPzFAElFMMyqu7naOp/z/AEpFukYZ55OBkdeM/l79KAJKKKKACiiuf8RfFfwv4R8Q2mkar4k0HTdW1DH2WxutQhhubnLbRsjZgzZbjgdaAOgooooAKKKKAIfsnJxtG7qAowfr3P51NRTBcKdv+0MjHcetAD6KaJlbOOcAH656VG99GiFiflGOTwDngYJ4OaAJqKjFwpI9T2BFPD5P1GaAFooppmABPPy9eOlADqKa06ohZmVVAyWJwMUw3igDr1x7j8Ov4daAJaKjW4V13Kd2DtO35sHuOKGu44yoZtm5gq7jjcT0x659qAJKKKaJAfw7UAOoqMXKkZw+M4+6T+nUfjQZ1B/TPv2H40ASUVHLciFAWWT5uwXOPqeg+p4o+1JtzuGDjByMHPT86AJKKYJwcfK3zdBjn/6340ol9iCex6/5FADqKj+1LsDc9wcc4I7H/OKFuld2UHO3qQc+v49u9AElFR/aF49SM4z2HX8vahrlUHOR06jHXgfmeKAJKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAGmTb684xX5aftqzap+1r8d/idrujSPJo/wpsFiiKgskpjlWOQ4yQc752HT5Yc8Hiv0H/ah+MEfwO/Z/8UeJmYfaNPs3WzAIy1y48uIdf+eh59getfEn/BP/APaG+Dvwo+APiXT/AB14oWHW/G11PHqUS6beXRMJQxAM0UTLkl5TwT96gD7N/Y/+M8fxz/Zt8L+JGkWW6ksxDfH/AJ5zxjbJn643D1DDODxXYeCPjB4V+Jc1zH4d8RaHr0lmQLhdO1CG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RRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUARtDvj2/L09OM/SlaLd/E31yf6U+igAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmGPnp7ZzggU+igCJYWVMcDPGPQe2AKloooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAqMQHZtO3b6AADHpj0qSigCIwtjjb+X3T6+9S0UUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAf//Z', 
                seeButton: false,
                seeTable: false,
                leyenda: '',
                confirmBtn: '<a href="https://wa.link/otqdmc" target="_blank" class="text-white"><i class="fab fa-whatsapp"></i> Whatsapp</a>',
                cancelBtn: '<a id="btnImpRes">Imprimir resultados</a>',
                patrimonio: '',
                autopension: ''
            },
            mounted() {
                $('.form-content').validate({
                    focusCleanup: true,
                    rules: {
                        nombre: {
                            required: true,
                        },
                        edad: {
                            required: true,
                            min: 18,
                            max: 98
                        },
                        aportacion: {
                            required: true,
                            min: 1500,
                            digits: true
                        }
                    },
                    errorElement: "span",
                    errorClass: 'invalid-feedback',
                    highlight: function (element) {
                        $(element).closest('.form-control').addClass('is-invalid');
                    },
                    unhighlight: function (element) {
                        $(element).closest('.form-control').removeClass('is-invalid');
                    }
                });
            },
            methods: {
                validForm() {
                    this.seeButton = $('.form-content').valid();
                },
                calc() {
                    $('#tblAP').show();
                    

                    let self = this,
                        swbb = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-primary ms-3'
                            },
                            buttonsStyling: false
                        });

                    if (!$('.form-content').valid()) {
                        self.seeTable = false;
                        return;
                    };

                    if (self.edad > 60) {
                        self.seeTable = false;
                        swbb.fire({
                            title: `<strong>¡Hola, ${self.nombre}!</strong>`,
                            icon: 'success',
                            html: 'Contacta a nuestros asesores para obtener una oferta de acuerdo a tus necesidades ',
                            focusConfirm: false,
                            confirmButtonText: self.confirmBtn
                        })
                    } else {
                        self.seeTable = true;
                        self.results = [];
                        self.anios = 65 - self.edad

                        self.results.push({
                            AportacionCliente: self.aportacion * 12,
                            aac: self.aportacion * 12,
                            rf: (self.aportacion * 12) * 1.12
                        });

                        let aacPre = 0;
                        let InflacionFija = 1.0;
                        if (self.inflacion) {
                            InflacionFija = 1.03;
                        }

                        for (let ix = 0; ix < self.anios - 1; ix++) {
                            let ac = self.results[ix].AportacionCliente;
                            contador = ac * InflacionFija;
                            rf = (self.results[ix].rf + contador) * 1.09;


                            if (ix == 0) {
                                aacPre = ac + contador;
                                self.results.push({
                                    AportacionCliente: contador,
                                    aac: ac + contador,
                                    rf: rf
                                });
                            } else {
                                aacPre += contador;
                                self.results.push({
                                    AportacionCliente: contador,
                                    aac: aacPre,
                                    rf: rf
                                });
                            }

                        }
                        let constanteAportacion = self.aportacion;
                        self.aportacion = formatNumber(constanteAportacion);
                        
                        self.patrimonio = formatNumber(self.results.slice(-1).pop().rf),
                            self.autopension = formatNumber((self.results.slice(-1).pop().rf / 20) / 12);

                        swbb.fire({
                            title: `<strong>¡Hola, ${self.nombre}!</strong>`,
                            icon: 'success',
                            html: `
                                Con una aportación regular de <b>$${self.aportacion}</b>, <br>
                                podrías llegar a tener un patrimonio de <br> 
                                <b>$${self.patrimonio}</b> a los <b>65 años</b>. <br>
                                Equivalente a una autopension de <br>
                                <b>$${self.autopension}</b> <br>
                                que podrías recibir mes a mes en tu edad de jubilación. <br><br>
                                Solicita una cita para iniciar ahora:
                            `,
                            focusConfirm: false,
                            showCancelButton: true,
                            confirmButtonText: self.confirmBtn,
                            cancelButtonText: self.cancelBtn
                        });

                        setTimeout(() => {
                            $('#btnImpRes').on('click', () => { self.imprimir(); });
                        }, 100);

                    }
                },
                imprimir() {

                    let self = this,
                        elem = $('#table-section').clone();

                    elem.find('.dtf-d-none').removeClass('dtf-d-none');
                    const $elem = elem.get(0);

                    var opt = {
                        filename: "AsesoríaPatrimonial.pdf",
                        margin:  [.8, .2, 1, .2],
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2.5
                        },
                        jsPDF: {
                            orientation: 'portrait',
                            unit: 'in',
                            format: 'letter' //[height, width]
                        },
                        pagebreak: {
                            mode: ['css', 'legacy'] //, 'css', 'legacy'
                        },
                    };
                    html2pdf().from($elem).set(opt).toPdf().get('pdf').then(function (pdf) {
                        var totalPages = pdf.internal.getNumberOfPages();
                        for (i = 1; i <= totalPages; i++) {
                            pdf.setPage(i);
                            pdf.addImage(self.imgF, 'JPEG', .2, pdf.internal.pageSize.getHeight() - 1, 8, .5);
                        }


                    }).save().catch(err => console.log(err));
                },
            },
        });</script>
</body>

</html>