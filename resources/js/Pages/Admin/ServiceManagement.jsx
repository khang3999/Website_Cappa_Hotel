import NavbarAdmin from '@/Components/AdminPage/NavbarAdmin';
import { Head } from '@inertiajs/react';
import '../../admin.js';
import ServiceContent from '@/Components/AdminPage/ServicesContent.jsx';
export default function ServiceAdmin({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Management" />
            <NavbarAdmin></NavbarAdmin>
            <ServiceContent></ServiceContent>
            {/* <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Enable both scrolling & backdrop</button>
            </div> */}
            {/* <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <p>Try scrolling the rest of the page to see this option in action.</p>
                    <a data-bs-dismiss="offcanvas">load</a>
                </div>
            </div> */}
        </>
    );
}
