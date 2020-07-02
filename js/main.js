(function () {
  "use strict";

  var regalo = document.getElementById("regalo");

  document.addEventListener("DOMContentLoaded", function () {

   /*--===============================
      GOOGLE MAPS
      =============================*/
      const mapa = document.getElementById('map');

      if(mapa){
        var map = L.map('map').setView([-33.389967, -71.670417], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-33.389967, -71.670417]).addTo(map)
            .bindPopup('Villa Padre Alvear.')
            .openPopup();
      }




    /*--===============================
      PARAMETROS DE OBJETOS
       =============================*/
    var p = {
      // CAMPOS DE USUARIOS
      nombre: document.getElementById("nombre"),
      apellido: document.getElementById("apellido"),
      email: document.getElementById("email"),

      // CAMPOS PASES
      pase_dia: document.getElementById("pase-dia"),
      pase_dos_dias: document.getElementById("dos-dias"),
      pase_completo: document.getElementById("todos-dia"),

      // BOTONES Y DIVS
      calcular: document.getElementById("calcular"),
      errorDiv: document.getElementById("error"),
      btnRegistro: document.getElementById("btnRegistro"),
      listaProductos: document.getElementById("lista-productos"),
      suma: document.getElementById("suma-total"),

      // EXTRAS
      etiquetas: document.getElementById("etiquetas"),
      camisas: document.getElementById("camisa-evento")
    };

    /*--===============================
    METODOS DE OBJETOS
     =============================*/
    var m = {
      inicio: function () {
        // EVENTOS DE REGISTRO


        if(document.getElementById('calcular')){
        p.btnRegistro.style.display = 'none';
        p.calcular.addEventListener("click", m.calcularMontos);
        p.pase_dia.addEventListener("blur", m.mostrarDias);
        p.pase_dos_dias.addEventListener("blur", m.mostrarDias);
        p.pase_completo.addEventListener("blur", m.mostrarDias);
        p.nombre.addEventListener('blur', m.validarCampo);
        p.apellido.addEventListener('blur', m.validarCampo);
        p.email.addEventListener('blur', m.validarMail);

        }

      },
      calcularMontos: function (e) {
        e.preventDefault();
        if (regalo.value === "") {
          alert("Debes de elegir un regalo");
          regalo.focus();
        } else {
          var boletosDia = parseInt(p.pase_dia.value, 10) || 0;
          var boletosDosDias = parseInt(p.pase_dos_dias.value, 10) || 0;
          var boletoCompleto = parseInt(p.pase_completo.value, 10) || 0;
          var cantEtiquetas = parseInt(p.etiquetas.value, 10) || 0;
          var cantCamisas = parseInt(p.camisas.value, 10) || 0;

          var totalPagar =
            boletosDia * 30 +
            boletosDosDias * 45 +
            boletoCompleto * 50 +
            cantCamisas * 10 * 0.93 +
            cantEtiquetas * 2;

          var listadoProductos = [];

          if (boletosDia > 0) {
            listadoProductos.push(`${boletosDia} Pases por dia`);
          }
          if (boletosDosDias > 0) {
            listadoProductos.push(`${boletosDosDias} Pases por dos dia`);
          }
          if (boletoCompleto > 0) {
            listadoProductos.push(`${boletoCompleto} Pases por todos los dia`);
          }
          if (cantEtiquetas > 0) {
            listadoProductos.push(`${cantEtiquetas}  Etiquetas`);
          }
          if (cantCamisas > 0) {
            listadoProductos.push(`${cantCamisas} Camisa`);
          }

          p.listaProductos.style.display = "block";
          p.listaProductos.innerHTML = "";
          for (var i = 0; i < listadoProductos.length; i++) {
            p.listaProductos.innerHTML += listadoProductos[i] + "<br/>";
          }

          p.suma.innerHTML = "$ " + totalPagar.toFixed(2);

          p.btnRegistro.style.display = 'block'

          document.getElementById('total_pedido').value = totalPagar;
        }
      },
      mostrarDias: function (e) {
        var boletosDia = parseInt(p.pase_dia.value, 10) || 0;
        var boletosDosDias = parseInt(p.pase_dos_dias.value, 10) || 0;
        var boletoCompleto = parseInt(p.pase_completo.value, 10) || 0;

        var diasElegidos = [];

        switch (e.target.id) {
          case "pase-dia":
            if (boletosDia > 0 || boletoCompleto > 0 || boletosDosDias > 0) {
              if (boletoCompleto > 0) {
                diasElegidos.push("viernes", "sabado", "domingo");
              } else if (boletosDosDias > 0) {
                diasElegidos.push("viernes", "sabado");
              } else {
                diasElegidos.push("viernes");
              }
            } else {
              diasElegidos.splice(0,2)
            }
            break;
          case "dos-dias":

            if (boletosDia > 0 || boletoCompleto > 0 || boletosDosDias > 0) {
              if (boletoCompleto > 0) {
                diasElegidos.push("viernes", "sabado", "domingo");
              } else if (boletosDosDias > 0) {
                diasElegidos.push("viernes", "sabado");
              } else {
                diasElegidos.push("viernes");
              }
            } else {
              diasElegidos.splice(0,2)
            }
            break;
          case "todos-dia":
            if (boletosDia > 0 || boletoCompleto > 0 || boletosDosDias > 0) {
              if (boletoCompleto > 0) {
                diasElegidos.push("viernes", "sabado", "domingo");
              } else if (boletosDosDias > 0) {
                diasElegidos.push("viernes", "sabado");
              } else {
                diasElegidos.push("viernes");
              }
            } else {
              diasElegidos.splice(0,2)
            }
            break;
          default:
            diasElegidos.splice(0,2)
            break;
        }


        if(diasElegidos.length > 0){
          for (var i = 0; i < diasElegidos.length; i++) {
            if(diasElegidos.length === 1){
              document.getElementById(diasElegidos[i]).style.display = "block";
              document.getElementById('sabado').style.display = "none";
              document.getElementById('domingo').style.display = "none";
            }
            if(diasElegidos.length === 2){
              document.getElementById(diasElegidos[i]).style.display = "block";
              document.getElementById('domingo').style.display = "none";
            }
            if(diasElegidos.length === 3){
              document.getElementById(diasElegidos[i]).style.display = "block";
            }

          }
        }else{
          document.getElementById('viernes').style.display = "none";
          document.getElementById('sabado').style.display = "none";
          document.getElementById('domingo').style.display = "none";
        }

      },
      validarCampo: function(e){
        if(this.value === ''){
          p.errorDiv.style.display = "block";
          p.errorDiv.innerHTML = "este campo es obligatorio";
          this.style.border = "1px solid red"
          p.errorDiv.style.border = "1px solid red"
        }else{
          p.errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc";
        }
      },
      validarMail:function(){
        if(this.value === ''){
          p.errorDiv.style.display = "block";
          p.errorDiv.innerHTML = "este campo es obligatorio";
          this.style.border = "1px solid red"
          p.errorDiv.style.border = "1px solid red"
        }else if(this.value.indexOf("@") > -1){
          p.errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc";
        }else{
          p.errorDiv.style.display = "block";
          p.errorDiv.innerHTML = "debe tener al menos una @";
          this.style.border = "1px solid red"
          p.errorDiv.style.border = "1px solid red"
        }
      }
    };

    m.inicio();
  }); //DOM CONTENT LOADED
})();


$(function(){


  //LETTERING
  $('.nombre-sitio').lettering();

  // AGREGAR CLASE A MENU
  $('body.conferecia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

  // PROGRAMA DE CONFERENCIA
  $('.ocultar').hide();
  $('.programa-evento .info-cursos:first').show();
  $('.programa-evento nav a:first').addClass('activo');

  $('.menu-programa a').on('click', enlacePresionado);

  function enlacePresionado(e){
    e.preventDefault();
    $('.ocultar').hide();
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');

    var enlace = $(this).attr('href');

    $(enlace).fadeIn(1000);
  }


  // ANIMACIONES PARA LOS NUMEROS
  var resumenLista = $('.resumen-evento');
  if(resumenLista.length > 0){
    $('.resumen-evento').waypoint(function(){

      $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
      $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
      $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
      $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);
    }, {
      offset:'60%'
    })
  }

  // CUENTA REGRESIVA
  $('.cuenta-regresiva').countdown('2020/07/20 09:00:00', function(event){
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  })

  // MENU FIJO
  var windowsHeight = $(window).height();
  var barraAltura = $('.barra').innerHeight();

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if(scroll > windowsHeight){
      $('.barra').addClass('fixed');
      $('body').css({'margin-top': barraAltura + 'px'});
    }else{
      $('.barra').removeClass('fixed');
      $('body').css({'margin-top': '0px'});
    }
  });

  // MENU NAVEGACION RESPONSIVO
  $('.barra-principal .menu-movil').click(function(){
    $('.navegacion-principal a').slideToggle();
  })

    // COLORBOX
    $('.invitado-info').colorbox({inline:true, width:"50%"});

    $('.boton_newsletter').colorbox({inline:true, width:"50%"});



});


