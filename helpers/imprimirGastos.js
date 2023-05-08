const btnGenerate = document.querySelector("#generate-pdf");

btnGenerate.addEventListener("click", () => {
  // Contenido del PDF
  const content = document.querySelector("#iGastos");

  // Configuracion del archivo final de PDF
  const options = {
    margin: [10, 10, 10, 10],
    filename: "informe.pdf",
    html2canvas: { scale: 2 },
    jsPDF: { unit: "mm", format: "A3", orientation: "portrait" },
  };

  // Generear y descargar el PDF
  html2pdf().set(options).from(content).save();
});
