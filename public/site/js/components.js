const components = [
    {
        title: "نشست خانواده و تربیت",
        description: "لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.",
        url: "/single-meeting",
        image: "site/img/marketing-agency/services-img1.jpg"
    },
    {
        title: "نشست مهدویت و رسانه",
        description: "لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.",
        url: "/single-meeting",
        image: "site/img/marketing-agency/services-img2.jpg"
    },
    {
        title: "نشست حجاب و عفاف",
        description: "لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.",
        url: "/single-meeting",
        image: "site/img/marketing-agency/services-img3.jpg"
    },
    {
        title: "نشست امام شناسی",
        description: "لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.",
        url: "/single-meeting",
        image: "site/img/marketing-agency/services-img4.jpg"
    }
];

const caseStudies = [
    {
        title: "سخنرانی و درس اخلاق آیت الله هاشمی اولیا",
        url: "/speech",
        image: "site/img/case-studies/case-studies-img1.jpg"
    },
    {
        title: "سخنرانی و درس اخلاق آیت الله هاشمی اولیا",
        url: "/speech",
        image: "site/img/case-studies/case-studies-img2.jpg"
    },
    {
        title: "سخنرانی و درس اخلاق آیت الله هاشمی اولیا",
        url: "/speech",
        image: "site/img/case-studies/case-studies-img3.jpg"
    },
    {
        title: "سخنرانی و درس اخلاق آیت الله هاشمی اولیا",
        url: "/speech",
        image: "site/img/case-studies/case-studies-img4.jpg"
    },
    {
        title: "سخنرانی و درس اخلاق آیت الله هاشمی اولیا",
        url: "/speech",
        image: "site/img/case-studies/case-studies-img5.jpg"
    }
];

const partners = [
    { image: 'site/img/partner-image/1.png', delay: '.2s' },
    { image: 'site/img/partner-image/2.png', delay: '.3s' },
    { image: 'site/img/partner-image/3.png', delay: '.4s' },
    { image: 'site/img/partner-image/4.png', delay: '.5s' },
    { image: 'site/img/partner-image/1.png', delay: '.6s' },
    { image: 'site/img/partner-image/2.png', delay: '.7s' }
];

const blogPosts = [
    {
        image: 'site/img/blog-image/1.jpg',
        url: '/single-news',
        category: 'کلاس اخلاق',
        title: 'دوره اخلاق و تربیت',
        date: '30 دی 1403'
    },
    {
        image: 'site/img/blog-image/2.jpg',
        url: '/single-news',
        category: 'ادب اجتماعی',
        title: 'دوره اداب اجتماعی فردی',
        date: '30 دی 1403'
    },
    {
        image: 'site/img/blog-image/3.jpg',
        url: '/single-news',
        category: 'اقتصاد اسلامی',
        title: 'دوره اقتصاد با محوریت اسلام',
        date: '30 دی 1403'
    },
    {
        image: 'site/img/blog-image/2.jpg',
        url: '/single-news',
        category: 'تفسیر قرآن',
        title: 'دوره تفسیر قرآن کریم',
        date: '30 دی 1403'
    }
];
function createMeetingElement(meeting) {
    const meetingElement = document.createElement('div');
    meetingElement.classList.add('col-lg-6', 'col-md-6', 'col-sm-6', 'wow', 'fadeInUp');

    meetingElement.innerHTML = `
        <div class="single-services-box">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="content">
                        <h3><a href="${meeting.url}">${meeting.title}</a></h3>
                        <p>${meeting.description}</p>
                        <a href="${meeting.url}" class="read-more-btn">ادامه مطلب <i class='bx bx-left-arrow-alt'></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="image bg-1">
                        <img src="${meeting.image}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    `;

    return meetingElement;
}

function renderMeetings(containerId) {
    const container = document.getElementById(containerId);
    components.forEach(meeting => {
        container.appendChild(createMeetingElement(meeting));
    });
}

function createCaseStudyElement(caseStudy) {
    const caseStudyElement = document.createElement('div');
    caseStudyElement.classList.add('single-case-studies-item');

    caseStudyElement.innerHTML = `
        <a href="${caseStudy.url}" class="image d-block">
            <img src="${caseStudy.image}" alt="image">
        </a>
        <div class="content">
            <h3><a href="${caseStudy.url}">${caseStudy.title}</a></h3>
            <a href="${caseStudy.url}" class="link-btn"><i class='bx bx-left-arrow-alt'></i></a>
        </div>
    `;

    return caseStudyElement;
}

function renderCaseStudies(containerId) {
    const container = document.getElementById(containerId);
    caseStudies.forEach(caseStudy => {
        container.appendChild(createCaseStudyElement(caseStudy));
    });
}

function createPartnerElement(partner) {
    const partnerElement = document.createElement('div');
    partnerElement.classList.add('col-lg-2', 'col-6', 'col-sm-3', 'col-md-4', 'wow', 'fadeInUp');
    partnerElement.setAttribute('data-wow-delay', partner.delay);

    partnerElement.innerHTML = `
        <div class="single-partner-box">
            <img src="${partner.image}" alt="image">
        </div>
    `;

    return partnerElement;
}

function renderPartners(containerId) {
    const container = document.getElementById(containerId);
    partners.forEach(partner => {
        container.appendChild(createPartnerElement(partner));
    });
}

function createBlogPostElement(post) {
    const postElement = document.createElement('div');
    postElement.classList.add('single-blog-post-item');

    postElement.innerHTML = `
        <div class="post-image">
            <a href="${post.url}" class="d-block">
                <img src="${post.image}" alt="image">
            </a>
        </div>
        <div class="post-content">
            <a href="${post.url}" class="category">${post.category}</a>
            <h3><a href="${post.url}">${post.title}</a></h3>
            <ul class="post-content-footer d-flex justify-content-between align-items-center">
                <li>
                    <div class="post-author d-flex align-items-center">
                        <!-- Author information can be added here -->
                    </div>
                </li>
                <li>
                    <i class='bx bx-calendar'></i> ${post.date}
                </li>
            </ul>
        </div>
    `;

    return postElement;
}

function renderBlogPosts(containerId) {
    const container = document.getElementById(containerId);
    blogPosts.forEach(post => {
        container.appendChild(createBlogPostElement(post));
    });
}
