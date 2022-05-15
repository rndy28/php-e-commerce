import { BASEURL } from './utils/constants.js';
import { toNormalNum } from './utils/index.js'

{
    const modal = document.querySelector('.js-modal');
    const btnOpenModal = document.querySelector('.js-open-modal');
    const btnCloseModal = document.querySelector('.js-close-modal');
    const table = document.querySelector('.js-table-barang');
    const form = document.querySelector('.js-form-modal');
    const submitBtn = document.querySelector('button[type="submit"]')
    const inputFile = document.querySelector('.input-file-container')

    btnOpenModal?.addEventListener('click', () => {
        form.reset();
        form.action = `${BASEURL}/dashboard/barang/create`;
        submitBtn.textContent = 'Create'
        modal.classList.add('is-visible')
    });
    btnCloseModal?.addEventListener('click', () => modal.classList.remove('is-visible'));

    table.addEventListener('click', (e) => {
        if (e.target.classList.contains('js-edit-btn')) {
            const row = e.target.parentElement.parentElement
            inputFile.style.display = 'none'
            document.getElementsByName('id_printer')[0].value = row.children[0].textContent;
            document.getElementsByName('nama_printer')[0].value = row.children[2].textContent;
            document.getElementsByName('spesifikasi_printer')[0].value = row.children[3].textContent;
            document.getElementsByName('harga_printer')[0].value = toNormalNum(row.children[4].textContent);
            form.action = `${BASEURL}/dashboard/barang/update`;
            submitBtn.textContent = 'Update'
            modal.classList.add('is-visible')
        }
    })
}