let panels = document.querySelectorAll(".panel");

panels.forEach(panel => {
    panel.addEventListener("mouseover", function(){
        this.classList.add("open");
        this.classList.add("openActive");
    })
    panel.addEventListener("mouseout", function(){
        this.classList.remove("open");
        this.classList.remove("openActive");
    })
});