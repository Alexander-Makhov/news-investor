<?php
add_filter( 'upload_mimes', 'svg_upload_allow' );
# Add SVG to the list of files allowed for downloading.
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
# Fix MIME type for SVG files.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {

    // WP 5.1 +
    if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    } else {
        $dosvg = ( '.svg' === strtolower( substr( $filename, - 4 ) ) );
    }

    // mime type has been reset, correct it
    // and also check the user right
    if ( $dosvg ) {

        // allow
        if ( current_user_can( 'manage_options' ) ) {

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } // forbid
        else {
            $data['ext'] = $type_and_ext['type'] = false;
        }

    }

    return $data;
}

function get_social_icons() {
    if( function_exists( "get_social_icons" )) {
        $social = array(
            "Facebook"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="networks-icon svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>'
            ],
            "Instagram"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>'
            ],
            "Itunes"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="itunes-note" class="svg-inline--fa fa-itunes-note fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M381.9 388.2c-6.4 27.4-27.2 42.8-55.1 48-24.5 4.5-44.9 5.6-64.5-10.2-23.9-20.1-24.2-53.4-2.7-74.4 17-16.2 40.9-19.5 76.8-25.8 6-1.1 11.2-2.5 15.6-7.4 6.4-7.2 4.4-4.1 4.4-163.2 0-11.2-5.5-14.3-17-12.3-8.2 1.4-185.7 34.6-185.7 34.6-10.2 2.2-13.4 5.2-13.4 16.7 0 234.7 1.1 223.9-2.5 239.5-4.2 18.2-15.4 31.9-30.2 39.5-16.8 9.3-47.2 13.4-63.4 10.4-43.2-8.1-58.4-58-29.1-86.6 17-16.2 40.9-19.5 76.8-25.8 6-1.1 11.2-2.5 15.6-7.4 10.1-11.5 1.8-256.6 5.2-270.2.8-5.2 3-9.6 7.1-12.9 4.2-3.5 11.8-5.5 13.4-5.5 204-38.2 228.9-43.1 232.4-43.1 11.5-.8 18.1 6 18.1 17.6.2 344.5 1.1 326-1.8 338.5z"></path></svg>'
            ],
            "Linkedin"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>'
            ],
            "Messenger"  => [
                "svg"       =>      '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 40 40"><path fill="#000" d="M8.69995 39.9C8.39995 39.9 8.09995 39.8 7.79995 39.7C7.39995 39.4 7.09995 38.9 7.09995 38.4L6.99995 34.8C6.99995 34.4 6.79995 34 6.49995 33.7C2.49995 30.1 0.199951 25 0.199951 19.4C0.199951 8.39997 8.79995 0.0999756 20.1 0.0999756C31.4 0.0999756 40 8.39997 40 19.4C40 30.4 31.4 38.7 20.1 38.7C18.1 38.7 16.2 38.4 14.3 37.9C13.9 37.8 13.6 37.8 13.2 38L9.29995 39.7C9.09995 39.9 8.89995 39.9 8.69995 39.9ZM7.69995 32.2C7.69995 32.2 7.79995 32.2 7.69995 32.2C8.49995 32.9 8.89995 33.8 8.89995 34.8L8.99995 37.8L12.4 36.3C13.2 36 14 35.9 14.8 36.1C16.5 36.6 18.2 36.8 20 36.8C30.2 36.8 37.9 29.4 37.9 19.5C37.9 9.59998 30.3 2.09998 20.1 2.09998C9.89995 2.09998 2.19995 9.49998 2.19995 19.4C2.19995 24.4 4.09995 29 7.69995 32.2Z"/><path fill="#000" fill-rule="evenodd" d="M8.09997 25.1L13.9 15.8C14.8 14.3 16.8 14 18.2 15L22.8 18.5C23.2 18.8 23.8 18.8 24.2 18.5L30.5 13.7C31.3 13.1 32.4 14.1 31.9 15L26.1 24.3C25.2 25.8 23.2 26.1 21.8 25.1L17.1 21.6C16.7 21.3 16.1 21.3 15.7 21.6L9.39997 26.4C8.69997 26.9 7.59997 25.9 8.09997 25.1Z" clip-rule="evenodd"/></svg>'
            ],
            "Skype"  => [
                "svg"       =>      '<svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m361.472656 512c-22.453125 0-44.695312-4.976562-64.761718-14.441406-14.269532 2.339844-26.542969 3.441406-38.191407 3.441406-135.378906 0-245.519531-108.808594-245.519531-242.550781 0-13.023438 1.292969-26.574219 3.9375-41.214844-11.101562-21.082031-16.9375-44.613281-16.9375-68.535156 0-81.992188 67.539062-148.699219 150.558594-148.699219 25.835937 0 51.078125 6.523438 73.46875 18.929688 10.199218-1.3125 21.359375-1.929688 34.492187-1.929688 65.417969 0 126.828125 25.050781 172.917969 70.53125 46.148438 45.542969 71.5625 106.246094 71.5625 170.925781 0 17.136719-1.167969 31.671875-3.648438 45.113281 8.398438 18.761719 12.648438 38.820313 12.648438 59.730469 0 81.992188-67.527344 148.699219-150.527344 148.699219zm-58.445312-56.195312 6.144531 3.265624c15.898437 8.457032 33.984375 12.929688 52.300781 12.929688 60.945313 0 110.527344-48.761719 110.527344-108.699219 0-16.996093-3.839844-33.1875-11.417969-48.125l-3.25-6.414062 1.574219-7.015625c2.792969-12.4375 4.09375-26.191406 4.09375-43.289063 0-111.082031-91.730469-201.457031-204.480469-201.457031-14.078125 0-25.257812.78125-35.191406 2.464844l-7.464844 1.261718-6.429687-3.996093c-17.609375-10.945313-37.96875-16.730469-58.875-16.730469-60.960938 0-110.558594 48.761719-110.558594 108.699219 0 19.335937 5.234375 38.316406 15.136719 54.890625l3.988281 6.679687-1.570312 7.621094c-3.066407 14.839844-4.554688 28.105469-4.554688 40.558594 0 111.6875 92.195312 202.550781 205.519531 202.550781 10.949219 0 22.917969-1.253906 37.667969-3.945312zm81.972656-144.941407c0-14.382812-2.839844-26.75-8.503906-36.757812-5.664063-9.964844-13.628906-18.308594-23.648438-24.820313-9.851562-6.375-21.941406-11.835937-35.90625-16.304687-13.804687-4.378907-29.414062-8.410157-46.394531-12.039063-13.4375-3.085937-23.214844-5.488281-29.042969-7.085937-5.695312-1.558594-11.359375-3.769531-16.882812-6.511719-5.324219-2.644531-9.515625-5.828125-12.53125-9.421875-2.8125-3.429687-5.089844-7.390625-5.089844-12.140625 0-7.761719 5.164062-14.300781 13.933594-20 9.074218-5.929688 21.300781-8.382812 36.339844-8.382812 16.175781 0 28 2.183593 35.039062 7.503906 7.269531 5.460937 13.601562 13.257812 18.824219 23.160156 4.527343 7.734375 8.605469 13.128906 12.53125 16.582031 4.222656 3.695313 10.320312 5.355469 18.089843 5.355469 8.542969 0 15.8125-2.777344 21.539063-8.710938 5.726563-5.902343 9.703125-12.683593 9.703125-20.136718 0-7.730469-3.304688-15.730469-7.660156-23.769532-4.324219-7.972656-11.152344-15.628906-20.398438-22.816406-9.148437-7.125-20.832031-12.886718-34.636718-17.15625-13.765626-4.277344-30.253907-6.410156-49.003907-6.410156-23.417969 0-44.148437 3.214844-61.535156 9.625-17.652344 6.476562-31.382813 15.972656-40.730469 28.109375-9.476562 12.234375-15.035156 26.441406-15.035156 42.210937 0 16.546876 5.320312 30.578126 14.328125 41.800782 8.882813 11.023437 20.996094 19.835937 36.074219 26.210937 14.703125 6.207031 33.1875 11.695313 54.964844 16.339844 16.011718 3.363281 28.96875 6.550781 38.519531 9.5 9.109375 2.816406 16.679687 6.953125 22.410156 12.273437 5.425781 5.054688 8.398437 11.53125 8.398437 19.769532 0 10.414062-5.421874 18.957031-15.871093 26.042968-10.683594 7.253907-24.890625 10.117188-42.238281 10.117188-12.632813 0-22.878907-.996094-30.484376-4.59375-7.570312-3.527344-13.5-8.109375-17.589843-13.496094-4.316407-5.664062-8.367188-12.773437-12.085938-21.257812-3.320312-7.757813-7.433593-13.800782-12.292969-17.863282-5.058593-4.242187-11.28125-6.789062-18.484374-6.789062-8.769532 0-16.140626 3.121094-21.90625 8.480469-5.792969 5.421875-8.742188 12.0625-8.742188 19.695312 0 12.238281 4.519531 24.921875 13.464844 37.671875 8.777344 12.644532 20.429687 22.917969 34.53125 30.484375 19.695312 10.410157 44.984375 15.667969 75.128906 15.667969 25.085938 0 47.164062-3.863281 65.546875-11.453125 18.589844-7.660156 32.921875-18.476563 42.636719-32.140625 9.75-13.699219 14.671875-29.359375 14.691406-46.542969zm0 0"/></svg>'
            ],
            "Tiktok"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="tiktok" class="svg-inline--fa fa-tiktok fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"></path></svg>'
            ],
            "Twitter"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>'
            ],
            "Telegram"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="telegram-plane" class="svg-inline--fa fa-telegram-plane fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path></svg>'
            ],
            "Whatsapp"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>'
            ],
            "Youtube"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>'
            ],
            "GitHub"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github-alt" class="svg-inline--fa fa-github-alt fa-w-15" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 512"><path fill="currentColor" d="M186.1 328.7c0 20.9-10.9 55.1-36.7 55.1s-36.7-34.2-36.7-55.1 10.9-55.1 36.7-55.1 36.7 34.2 36.7 55.1zM480 278.2c0 31.9-3.2 65.7-17.5 95-37.9 76.6-142.1 74.8-216.7 74.8-75.8 0-186.2 2.7-225.6-74.8-14.6-29-20.2-63.1-20.2-95 0-41.9 13.9-81.5 41.5-113.6-5.2-15.8-7.7-32.4-7.7-48.8 0-21.5 4.9-32.3 14.6-51.8 45.3 0 74.3 9 108.8 36 29-6.9 58.8-10 88.7-10 27 0 54.2 2.9 80.4 9.2 34-26.7 63-35.2 107.8-35.2 9.8 19.5 14.6 30.3 14.6 51.8 0 16.4-2.6 32.7-7.7 48.2 27.5 32.4 39 72.3 39 114.2zm-64.3 50.5c0-43.9-26.7-82.6-73.5-82.6-18.9 0-37 3.4-56 6-14.9 2.3-29.8 3.2-45.1 3.2-15.2 0-30.1-.9-45.1-3.2-18.7-2.6-37-6-56-6-46.8 0-73.5 38.7-73.5 82.6 0 87.8 80.4 101.3 150.4 101.3h48.2c70.3 0 150.6-13.4 150.6-101.3zm-82.6-55.1c-25.8 0-36.7 34.2-36.7 55.1s10.9 55.1 36.7 55.1 36.7-34.2 36.7-55.1-10.9-55.1-36.7-55.1z"></path></svg>'
            ],
            "BitBucket"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="bitbucket" class="svg-inline--fa fa-bitbucket fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M22.2 32A16 16 0 0 0 6 47.8a26.35 26.35 0 0 0 .2 2.8l67.9 412.1a21.77 21.77 0 0 0 21.3 18.2h325.7a16 16 0 0 0 16-13.4L505 50.7a16 16 0 0 0-13.2-18.3 24.58 24.58 0 0 0-2.8-.2L22.2 32zm285.9 297.8h-104l-28.1-147h157.3l-25.2 147z"></path></svg>'
            ],
            "MySpace"  => [
                "svg"       =>      '<svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M400,224c-31.36,0-59.648,13.024-80,33.856V256c0-52.928-43.072-96-96-96c-31.136,0-58.56,15.136-76.128,38.176 C133.76,175.36,108.736,160,80,160c-44.096,0-80,35.904-80,80v112h128v64h160v96h224V336C512,274.24,461.76,224,400,224z"/></g></g><g><g><circle cx="400" cy="96" r="96"/></g></g><g><g><circle cx="224" cy="80" r="64"/></g></g><g><g><circle cx="80" cy="96" r="48"/></g></g></svg>'
            ],
            "Reddit"  => [
                "svg"       =>      '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="reddit-alien" class="svg-inline--fa fa-reddit-alien fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M440.3 203.5c-15 0-28.2 6.2-37.9 15.9-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2 22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8-9.7-10.1-23.4-16.3-38.4-16.3-55.6 0-73.8 74.6-22.9 100.1-1.8 7.9-2.6 16.3-2.6 24.7 0 83.8 94.4 151.7 210.3 151.7 116.4 0 210.8-67.9 210.8-151.7 0-8.4-.9-17.2-3.1-25.1 49.9-25.6 31.5-99.7-23.8-99.7zM129.4 308.9c0-22 17.6-39.7 39.7-39.7 21.6 0 39.2 17.6 39.2 39.7 0 21.6-17.6 39.2-39.2 39.2-22 .1-39.7-17.6-39.7-39.2zm214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0-4-3.5-4-9.7 0-13.7 3.5-3.5 9.7-3.5 13.2 0 27.8 28.5 120 29 149 0 3.5-3.5 9.7-3.5 13.2 0 4.1 4 4.1 10.2.1 13.7zm-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2 0-22 17.6-39.7 39.2-39.7 22 0 39.7 17.6 39.7 39.7-.1 21.5-17.7 39.2-39.7 39.2z"></path></svg>'
            ]
        );
        return $social;
    }
}

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args = '' ){
    $args[ "container" ] = false;
    return $args;
}

add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

## Current page class.
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    $current_url = ( is_ssl()?'https://' : 'http://' ).$_SERVER[ 'HTTP_HOST' ].$_SERVER[ 'REQUEST_URI' ];
    if ( $item->url === $current_url ) :
        return array('item current-page');
    endif;
    return array('item');
}

## Remove current page attr href
add_action( 'nav_menu_link_attributes', 'wp_nav_menu_no_current_link', 10, 4 );
function wp_nav_menu_no_current_link( $atts, $item, $args, $depth ) {
    if ( $item->current ) $atts['href'] = '';
    return $atts;
}

## Delete one of the menu items
add_filter( 'wp_nav_menu_objects', 'change_nav_menu_objects', 10, 2 );
function change_nav_menu_objects( $sorted_menu_items, $args ) {
    foreach ( $sorted_menu_items as $index => $item ) {
        if ( is_front_page() && $item->url === site_url() . "/" || is_home() && $item->url === site_url() . "/" ) :
            unset( $sorted_menu_items[ $index ] );
        endif;
    }

    return $sorted_menu_items;
}

// Custom form search.
add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

    $form = '
	<form class="custom-form-search" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<div class="label label-input-search">
            <label class="screen-reader-text" for="s">'. esc_html__( "Search query:", "start-theme-kit" ) .'</label>
            <input class="input-search" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. esc_html__( "Search ...:", "start-theme-kit" ) .'"/>
        </div>
		<div class="label label-btn-submit">
		    <input type="submit" id="searchsubmit" class="btn" value="'. esc_html__( "Search", "start-theme-kit" ) .'" />
        </div>
	</form>';

    return $form;
}

function view_current_page_class() {
    is_front_page()
        ? $pageClass = 'front-page'
        : $pageClass = ( get_post_type() === 'post' || is_single()) ? 'other-single-page' : 'other-page';
        return $pageClass;
}

function the_truncated_post( $text, $symbol_amount) {
    $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters( '$text', $text ))) );
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}