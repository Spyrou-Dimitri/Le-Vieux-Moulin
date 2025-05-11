import {settings} from "./settings";

export const observers = {
    appearElements: document.querySelectorAll(`[data-animation='${settings.appearClass}']`),


    init() {
        this.appearElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearObserver = new IntersectionObserver(this.appearAnimate.bind(this), {threshold: 0.5});
        this.observerAction()
    },
    appearAnimate(elements) {
        let index = 0;

        elements.forEach((element) => {
            if (element.isIntersecting) {
                setTimeout(()=>{
                    element.target.classList.add(settings.appearClass)
                    element.target.classList.remove(settings.noOpacityClass)
                }, index * 300)
                index++;
            }
        })
    },
    observerAction() {
        this.appearElements.forEach((element) => {
            this.appearObserver.observe(element)
        })
    }

}