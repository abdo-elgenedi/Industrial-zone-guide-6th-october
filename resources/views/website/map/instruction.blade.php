<div class="modal fade" id="instrution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                تعليمات استخدام الخريطة
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  @if(isset($color)) bg-{{$color}} @endif">
                <ul> تعليمات استخدام الخريطة
                    <li>ستظهر لك المناطق المشغولة باللون الاصفر </li>
                    <li>سيظهر لك لون كل مصنع علي حسب تصنيف المصنع</li>
                    <li>عن الاشاره بالمؤشر علي المصنع سيظهر لك جزء من بياناته</li>
                    <li>لرؤوية معلومات اكثر اضغط مرتين علي موقع المصنع</li>
                    <li>لزيارة صفحة المصنع ستجد الرابط داخل الصفحة السابقة</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>