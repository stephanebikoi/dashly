const state = {};

const div1 = document.getElementById("div1");

var data = div1.getAttribute("data-person");

state.data= data;
state.customData = data;

state.valuePoste = "";
state.valueFunction = "";
var tbody = document.getElementById("UserTable");

const insertElem = (item)=>{
    // tbody.innerHTML = "";
    tbody.insertAdjacentHTML('afterbegin', createFormUpdate(item));
}
// filter data width select Poste

document.getElementById('poste').addEventListener('change', e=>{
    let count = 0;
    state.valueSatus = e.target.value;
    tbody.innerHTML = "";
    let cusData = state.customData.slice(0,state.valueEntries);
    cusData.forEach(item=>{
        if(e.target.value == 'Any' && state.valueFunction == 'All'){ // Any vs All
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            // console.log(item);
            count++;
        }
        else if(e.target.value == 'Any' && state.valueFunction == item.Function){ // Any vs One
             tbody.insertAdjacentHTML('beforeend', create_elment(item));
            // console.log(item);
            count++;
        }
        else if(item.Poste == state.valueSatus && state.valueFunction == 'All'){ // One vs All
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            // console.log(item);
            count++;
        }
        else if(item.Poste == state.valueSatus && state.valueFunction == item.Function){ // One vs One
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            // console.log(item);
            count++;
        }
        
    })

    state.numberDisplay = count;
    document.getElementById('number-display').innerHTML = state.numberDisplay;


});

// filter data width select location
document.getElementById('function').addEventListener('change', e=>{
    state.valueFunction = e.target.value;
    let count = 0;
    tbody.innerHTML = "";
    let cusData = state.customData.slice(0,state.valueEntries);
    cusData.forEach(item=>{
        if(e.target.value == 'All' && state.valueSatus == 'Any'){ // All vs Any
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            count++;
        }
        else if(e.target.value == 'All' && state.valueSatus == item.Poste){ // All vs One
             tbody.insertAdjacentHTML('beforeend', create_elment(item));
            count++;
        }
        else if(item.Function == state.valueFunction && state.valueSatus == 'Any'){ // One vs Any
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            count++;
        }
        else if(item.Function == state.valueFunction && state.valueSatus == item.Poste){ // One vs One
            tbody.insertAdjacentHTML('beforeend', create_elment(item));
            count++;
        }
        
    })
    state.numberDisplay = count;
    document.getElementById('number-display').innerHTML = state.numberDisplay;
});

function create_elment(item){
    return `
    
    <tr id="${item.id}">
        <td class="id">${item.id}</td>
        <td>
            $<?php if(empty($staff->profil)) {
                $a = strtoupper(substr($staff->firstname, 0, 1));
                $b = strtoupper(substr($staff->lastname, 0, 1)); ?>
                <div class="avatar avatar-circle avatar-xs me-2">
                    <span class="avatar-title text-bg-danger-soft" style="color: purple; width:40px; height:40px;"><?= $a.$b ?></span>
                </div>
            <?php } else { ?>
                <div class="avatar avatar-circle avatar-sm avatar-online">
                    <img src="/img/staffs/<?= $staff->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                </div>
            <?php } ?>
            <span class="name fw-bold mx-3"><?= $staff->firstname . ' '. $staff->otherfirstname . ' '. $staff->lastname ?></span>
        </td>
        <td class="email"><?= $onfunction->name ?></td>
        <td class="id"><?= $onposte->name ?></td>
        <td class="date" data-signed="1627858800">
            <a class="p-3" href="/staffs/show_staff/<?= $staff->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="p-3" href="/staffs/edit/<?= $staff->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
            <a class="p-3" href="/staffs/delete/<?= $staff->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </td>
    </tr>
    `;
}
// search data 


function getDataSearch(){
   
    let searchValue = document.getElementById("value-search");
        searchValue.addEventListener("keyup",()=>{
        tbody.innerHTML = "";
        if(checkSearchValue(searchValue.value)){
            
            tbody.insertAdjacentHTML('beforeend', create_elment(checkSearchValue(searchValue.value)));
            // console.log(checkSearchValue(searchValue.value));
            
        }
        else if(searchValue.value == ""){
            load();
        }
        
    })
    

};

let checkSearchValue = valueCheck =>{
    let dataCheck = state.customData;
    for(let i in dataCheck){
        if(valueCheck==""){
            return "";
        }
        else if(dataCheck[i].Function.toLowerCase().includes(valueCheck.toLowerCase())|| dataCheck[i].Poste.toLowerCase().includes(valueCheck.toLowerCase())|| dataCheck[i].Customer.toLowerCase().includes(valueCheck.toLowerCase())){
            return dataCheck[i];
        }
        
    }
}
function load() {
    tbody.innerHTML = "";
    for (let i in state.customData.slice(0,state.valueEntries)) {
        tbody.insertAdjacentHTML('beforeend',create_elment(state.customData[i]));
    }
}