document.addEventListener('DOMContentLoaded', function() {
    // Get the buttons and the project content
    const buttons = document.querySelectorAll('.nav-btn-pro .btn2');
    const projectContent = document.querySelector('.project-content-btn p');
    const projectImage = document.getElementById('project-image').querySelector('img');

    // Add event listener to each button
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove the 'active' class from all buttons
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Add the 'active' class to the clicked button
            button.classList.add('active');

            // Get the target from the data attribute
            const target = button.getAttribute('data-target');

            // Update the project content based on the target
            if (target === 'residential') {
                projectContent.innerHTML = `
                    <p>
                        This is a residential building. It was built in 996 lakes and signed.
                    </p>
                `;
                projectImage.src = '/image/blog-4.jpg';
                projectImage.alt = 'Residential Project';
            } else if (target === 'commercial') {
                projectContent.innerHTML = `
                    <p>
                        This is a commercial building. It was built in 996 lakes and signed.
                    </p>
                `;
                projectImage.src = '/image/blog-3.jpg';
                projectImage.alt = 'Commercial Project';
            } else if (target === 'special') {
                projectContent.innerHTML = `
                    <p>
                        This is a special building. It was built in 996 lakes and signed.
                    </p>
                `;
                projectImage.src = '/image/blog-1.jpg';
                projectImage.alt = 'Special Project';
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;

            // Close all answers
            faqQuestions.forEach(q => {
                const otherAnswer = q.nextElementSibling;
                if (otherAnswer !== answer) {
                    otherAnswer.classList.remove('active');
                    q.classList.remove('active'); // Remove active class from all buttons
                }
            });

            // Toggle the clicked answer
            answer.classList.toggle('active');
            this.classList.toggle('active'); 
        });
    });
});




function showProject(projectName) {
    switch (projectName) {
        case 'architecture':
            document.getElementById('projectImage').src = 'image/project/architecture-01.png';
            document.getElementById('projectTitle01').innerText = 'Modern Minimalist Residence';
            document.getElementById('projectDescription01').innerText = 'Exemplifying simplicity and sophistication, this architectural design model emphasizes clean lines, open spaces, and minimalist aesthetics, ideal for contemporary urban living.';
            break;
        case 'interior':
            document.getElementById('projectImage').src = 'image/project/interior-design-01.jpg';
            document.getElementById('projectTitle01').innerText = 'Balcony Retreat';
            document.getElementById('projectDescription01').innerText = 'Create an outdoor sanctuary with this interior design model for balconies, featuring cozy seating, vibrant plants, and ambient lighting, perfect for relaxing and enjoying the views.';
            break;
        case 'multi-sector':
            document.getElementById('projectImage').src = 'image/project/Multi-sector-commercial-01.jpeg';
            document.getElementById('projectTitle01').innerText = 'Jayalakshmi Silks PVT LTD';
            document.getElementById('projectDescription01').innerText = 'Jayalakshmi Silks in Udupi offers a diverse range of exquisite silk sarees and ethnic wear and traditional craftsmanship.';
            break;
        case 'construction':
            document.getElementById('projectImage').src = 'image/project/construction-consulting-2.jpg';
            document.getElementById('projectTitle01').innerText = 'Client Presentation';
            document.getElementById('projectDescription01').innerText = 'Elevate your client presentations with seamless online meetings, fostering collaboration and clarity in project communication.';
            break;

        case 'renovation':
            document.getElementById('projectImage').src = 'image/project/renovation-01.jpeg';
            document.getElementById('projectTitle01').innerText = 'Mangalore Railway Station';
            document.getElementById('projectDescription01').innerText = 'Transforming travel experiences through the revitalization of Mangalore Railway Station, ensuring modern amenities and enhanced passenger comfort.';
            break;

        case 'maintenance':
            document.getElementById('projectImage').src = 'image/project/maintaince-02.jpg';
            document.getElementById('projectTitle01').innerText = 'AC Service';
            document.getElementById('projectDescription01').innerText = 'Keeping indoor environments comfortable with efficient AC maintenance.';
            break;
        default:
            break;
    }
}
