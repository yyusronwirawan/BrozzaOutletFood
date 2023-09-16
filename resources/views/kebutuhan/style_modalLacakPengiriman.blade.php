<style>
    /* CSS untuk stapper */
    .steps {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .step {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
    }

    /* .step .step-icon-wrap {
                        position: relative;
                        width: 80px;
                        height: 80px;
                        margin-bottom: 10px;
                    } */

    .step .step-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 24px;
    }

    .step .step-title {
        margin: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500;
    }

    .step.completed .step-icon {
        background-color: #0da9ef;
        color: #fff;
    }

    /* Tambahkan jarak antara langkah-langkah */
    .step:not(:first-child) {
        margin-left: 30px;
    }

    /* Garis antara langkah-langkah */
    .step:not(:first-child)::before {
        content: "";
        position: absolute;
        top: 50%;
        left: -30px;
        width: 50px;
        height: 2px;
        background-color: #e1e7ec;
        transform: translateY(-50%);
    }

    /* Tambahkan warna latar belakang untuk garis pada langkah yang telah selesai */
    /* .step.completed:not(:first-child)::before {
                    background-color: #0da9ef;
                } */

    /* Tambahkan warna latar belakang untuk garis pada langkah yang telah selesai tetapi bukan langkah terakhir */
    .step.completed:not(:last-child)::before {
        background-color: #0da9ef;
    }

    /*
        .step.completed:nth-child(4)::before {
            background-color: transparent;
        } */
</style>
