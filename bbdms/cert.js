const generatePDF=async(name,id)=>{
    const{PDFDocument,rgb}=PDFLib;

    const exBytes=await fetch("./blood_cert.pdf").then((res)=>{
        return res.arrayBuffer();
    });

    const exFont=await fetch("./AlexBrush-Regular.ttf").then((res)=>{
        return res.arrayBuffer();
    })

    const pdfDoc=await PDFDocument.load(exBytes);
    
    pdfDoc.registerFontkit(fontkit);
    const myFont=await pdfDoc.embedFont(exFont);

    const pages=pdfDoc.getPages();
    const firstPg=pages[0];

    firstPg.drawText(name,{
        x: 250,
        y: 280,
        size:50,
        font:myFont,
        color:rgb(0,0,0)
    })

    firstPg.drawText(id,{
        x:60,
        y:558,
        size:20,
        // font:myFont,
        color:rgb(0,0,0)
    })

    const uri=await pdfDoc.saveAsBase64({dataUri:true});
    window.open(uri);
    document.querySelector("#mypdf").src=uri;
}

// generatePDF("Nandini","211IT043");

// FileSaver saveAs(Blob/File/Url, optional DOMString filename, optional Object { autoBom:true })

// generatePDF("Shreya Jindrali","211IT064")

// window.addEventListener('DOMContentLoaded', function() {
//     // Make an AJAX request to fetch the name and donor ID from the PHP script
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 // Parse the JSON response
//                 // var response = JSON.parse(xhr.responseText);
//                 // var name = response.name;
//                 // var donorId = response.donorId;

//                 generatePDF("Nandini","211IT043");
//                 // Update the placeholder elements with the retrieved name and donor ID
//                 // document.getElementById('name-placeholder').textContent = name;
//                 // document.getElementById('donor-id-placeholder').textContent = donorId;
//             } else {
//                 console.error('Error:', xhr.status);
//             }
//         }
//     };
//     xhr.open('GET', 'test.php', true);
//     xhr.send();
// });