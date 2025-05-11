import {settings} from "./settings";

export const observers = {
    appearElements: document.querySelectorAll(`[data-animation='${settings.showUpClass}']`),


    init() {
        this.appearObserver = new IntersectionObserver(this.showUpAnimate.bind(this), {threshold: 0.25});
        this.observerAction()
    },
    appearAnimate(elements) {
        let index = 0;
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.add(settings.showUpClass)
                element.target.classList.remove(settings.noOpacityClass)
            }
        })
    },
    observerAction() {
        this.showUpElements.forEach((element) => {
            this.appearObserver.observe(element)
        })
    }

}