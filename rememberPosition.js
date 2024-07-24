// save position
window.addEventListener("beforeunload", ()=>{
    document.cookie = "pageYOffset=" + window.pageYOffset + "; path=/; SameSite=Strict";
});

// remember position
let cookies = document.cookie.split(";");
let cname = "pageYOffset";
let cvalue;
for(let i = 0; i<cookies.length; i++) {
    let name = "";
    while(cookies[i][0] != "=") {
        name += cookies[i][0];
        cookies[0]=cookies[0].slice(1);
    }
    if(cname == name) {
        cvalue = cookies[i].slice(1);
    } else continue;
}
console.log(cvalue);

//apply position
window.scrollTo(0, cvalue);