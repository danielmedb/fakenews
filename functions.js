window.onload = function () {
    list = document.querySelectorAll(".like-post");
    for (let i = 0; i < list.length; i++) {
        list[i].addEventListener("click", function (e) {
            e.preventDefault();
            _this = this.getElementsByClassName('fa-stack-1x')[0];
            NumberOfLikes = parseInt(_this.innerText);

            /* duo to no database. change target so if clicked again, minus on the likes */
            (parseInt(_this.getAttribute("likes")) === NumberOfLikes ? NumberOfLikes++ : NumberOfLikes--)

            /* update text */
            _this.innerHTML = NumberOfLikes;
        });
    }

    readMore = document.querySelectorAll(".card-body p");
    for(let i = 0; i < readMore.length; i++){

        /* change height on card-content if offset height is larger than 190 */
        const element = readMore[i].parentNode.getElementsByClassName('card-content')[0];
        if(element.offsetHeight < '190'){
            readMore[i].innerText = ''; 
        }else{
            element.style.height = '190px';
            element.style.overflow = 'hidden';
        }

        readMore[i].addEventListener("click", function (e){
            e.preventDefault();
            let text = this;
            _this = this.parentNode.getElementsByClassName('card-content')[0];
            if(_this.style.height === '190px'){
                text.innerText = 'Läs mindre';
                _this.style.height = 'auto';
            }else{
                text.innerText = 'Läs hela nyheten';
                _this.style.height = '190px';
            }
        });
    }
    
};

