document.addEventListener('DOMContentLoaded', ()=>{

    let form = document.forms[0];

    form.addEventListener('submit', (event)=>{
        let datanyafrom = new FormData(form);
        

        let dataTampung=[];
        let isidata;

        for( isidata of datanyafrom.keys() ){
            const isivalue = datanyafrom.get(isidata);

            if (isivalue.trim() === ''){
                dataTampung.push([isidata]);
            }
            console.log(`Key Name = ${isidata} | Value = ${isivalue}`)
        }
        
        if(dataTampung.length != 0){
            let hasil='Data Bagian : \n [ ';

            dataTampung.forEach(function(isi,index){
                hasil+=isi+', ';
            });

            alert(hasil+' ] Kosong Harap Di Lengkapi');
        }
        else{
            alert('TERIMAKASIH TELAH LOGIN');
            event.defaultPrevented();
        }
        event.preventDefault();
    });
    
} );
