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
        <link rel="stylesheet" href="calculadora.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-4" style="background-color:rgb(17,36,105)!important;">&nbsp;</div>
        <div class="col-sm-4" style="background-color:rgb(17,36,105)!important;">

            <a href="https://apasesoriapatrimonial.com.mx/">
                <center>
                    <img src="logoOficial.jpg" style="height:50%;width:38%;padding:3%;" alt="Logo">
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
                                <img src="logoPDF.png" width="150" class="dtf-img"
                                style="margin-left:40%;">
                            </div>
                            <div id="leyendaKiyosaki"  class="col-md-6 d-flex align-items-center justify-content-center">
                                <div id="leyendaKiyosaki1" class="text-color text-leyend"><small class="text-justify">"Es importante tener el
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
                imgF: 'footer.png', 
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
                    const mobileMargin = [.1, .2, 0.8, .2];
                    const desktopMargin = [.8, .2, 1, .2]; 
                    elem.find('.dtf-d-none').removeClass('dtf-d-none');
                    const $elem = elem.get(0);
                    var opt = {
                        filename: "AsesoríaPatrimonial.pdf",
                        margin:  screen.width < 600 ? mobileMargin : desktopMargin,
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
                            format: screen.width < 600 ? 'Tabloid' : 'letter'   
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