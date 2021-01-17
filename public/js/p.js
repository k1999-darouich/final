const tl = gsap.timeline({ defaults: { ease: "power1.out" } });
tl.to(".text", { y: "0%", duration: 1, stagger: 0.25 });
tl.to(".slider", { y: "-100%", duration: 1.5, delay: 0.5 });
tl.to(".intro", { y: "-100%", duration: 1 }, "-=1");
tl.fromTo("header-blue", { opacity: 0 }, { opacity: 1, duration: 1 });
tl.fromTo(".big-text", { opacity: 0 }, { opacity: 1, duration: 1 }, "-=1");



new fullpage('#fullpage', {
    autoScrolling: true,
    navigation: true,
    scrollingSpeed: 1000,
    responsive: 600,
    onLeave: (origin, destination, direction) => {
        const section = destination.item;
        const title = section.querySelector('h2');
        const titles = section.getElementsByTagName('h3');
        const tl = gsap.timeline({defaults: {ease: "power0.out"}, delay: 1,});

        tl.fromTo(title,-0.5, {y: "50", opacity: 0}, {y: 0, opacity: 1});

        if(destination.index===1 && window.innerWidth>=600){
            const t2 = gsap.timeline({defaults: {ease: "power0.out"}, delay: 1,});
            t2.fromTo(".text",-0.8, {y: "50", opacity: 0}, {y: 0, opacity: 1});
            t2.fromTo(".image1", {display: "inline", x: "100", opacity: 0}, {x: 0, opacity: 1, duration: 0.2,});
            t2.fromTo(".image2", {display: "inline", x: "100", opacity: 0}, {
                x: 0,
                opacity: 1,
                duration: 0.2,

            });

            t2.fromTo(".image3", {display: "inline", x: "100", opacity: 0}, {
                x: 0,
                opacity: 1,
                duration: 0.2,

            });
            t2.fromTo(".image4", {display: "inline", x: "100", opacity: 0}, {
                x: 0,
                opacity: 1,
                duration: 0.2,

            });

            t2.fromTo(titles,-0.5, {y: "50", opacity: 0}, {y: 0, opacity: 1});
        }

    },

})
