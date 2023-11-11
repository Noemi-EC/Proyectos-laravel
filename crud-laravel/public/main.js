function generarPDF(){
    // De jspdf utilizamos la clase jsPDF
    var doc = new jsPDF('p', 'pt', 'letter');
    // De autotable utilizamos el método autoTable para seleccionar los datos de la tabla
    doc.autoTable({
      html: '.table',
      columnStyles: {
        0: {
          cellWidth: 150,
        },
        1: {
          cellWidth: 150,
        },
        2: {
          cellWidth: 150,
        }
      }
    })
    // guardamos los datos en un archivo llamado Estudiantes.pdf con el método save
    doc.save('tareas.pdf');
    alert("¡PDF generado exitosamente!");
  }

  function copiarTablaAlPortapapeles() {
    // Selecciona la tabla
    const tabla = document.querySelector('table');
    const tablaSeleccionada = window.getSelection();
    const rango = document.createRange();
    rango.selectNodeContents(tabla);
    tablaSeleccionada.removeAllRanges();
    tablaSeleccionada.addRange(rango);

    // Copia la tabla al portapapeles
    document.execCommand('copy');

    // Deselecciona la tabla
    tablaSeleccionada.removeAllRanges();
    alert("¡Tabla copiada exitosamente!");
  }

//   const btnCopiarTabla = document.querySelector('#btn-copiar-tabla');
//   btnCopiarTabla.addEventListener('click', copiarTablaAlPortapapeles);

  function exportarTablaAExcel() {
    // Selecciona la tabla
    const tabla = document.querySelector('table');

    // Crea un libro de Excel
    const libro = XLSX.utils.book_new();

    // Crea una hoja de Excel con los datos de la tabla
    const datos = XLSX.utils.table_to_sheet(tabla);
    XLSX.utils.book_append_sheet(libro, datos, 'Tabla');

    // Guarda el archivo de Excel
    XLSX.writeFile(libro, 'tareas.xlsx');
  }

//   const btnExportarExcel = document.querySelector('#btn-exportar-excel');
//   btnExportarExcel.addEventListener('click', exportarTablaAExcel);
