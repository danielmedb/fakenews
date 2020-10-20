window.onload = function () {
    list = document.querySelectorAll(".like-post");
    for (var i = 0; i < list.length; i++) {
        list[i].addEventListener("click", function (e) {
            e.preventDefault();
            _this = this.getElementsByClassName('fa-stack-1x')[0];
            NumberOfLikes = parseInt(_this.innerText);

            /* DUO TO NO DATABASE. CHANGE TARGET SO IF CLICKED AGAIN, MINUS ON THE LIKES */
            if(parseInt(_this.getAttribute("likes")) === NumberOfLikes){
                /* UPDATE LIKES +1 */
                NumberOfLikes++;
            }else{
                /* UPDATE LIKES -1 */
                NumberOfLikes--;
            }           
            /* UPDATE TEXT */
            _this.innerHTML = NumberOfLikes;
        });
    }
};

