<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <!-- s-book... like search-book -->
                <label for="s-book_category">Kitap Kategoriýasy</label>
                <select class="form-control" name="s-book_category" id="s-book_category">
                    <option value="0">Kitap Kategoriýasy</option>
                    <option value="1">Okuw Kitap</option>
                    <option value="2">Çeper Eser</option>
                    <option value="3">Ýazuw Depder</option>
                    <option value="4">Mugallym Gollanma</option>
                    <option value="5">Prezidentiň Kitaby</option>
                    <option value="6">Zambak Kitap</option>
                    <option value="7">Başga Mekdepden Alynan Kitap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="s-book_serialnumber">Seriýa Nomeri</label>
                <input type="text" class="form-control" name="s-book_serialnumber" id="s-book_serialnumber" placeholder="Seriýa Nomeri">
            </div>
            <div class="form-group">
                <label for="s-book_name">Kitap Ady</label>
                <input type="text" class="form-control" name="s-book_name" id="s-book_name" placeholder="Kitap Ady">
            </div>
            <div class="form-group">
                <label for="s-book_author">Kitap Awtory</label>
                <input type="text" class="form-control" name="s-book_author" id="s-book_author" placeholder="Kitap Awtory">
            </div>
            <div class="form-group">
                <label for="s-book_year">Kitap Neşir Ýyly</label>
                <input type="text" class="form-control" name="s-book_year" id="s-book_year" placeholder="Kitap Neşir Ýyly">
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="s-student_cat">Okuwçynyň kategoriýasy</label>
                <select class="form-control" name="s-student_cat" id="s-student_cat" required>
                    <option value="0">Okuwçynyň kategoriýasy</option>
                    <option value="1">Başlangyç (1-4)</option>
                    <option value="2">Orta (5-10)</option>
                    <option value="3">Uly (11-12)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="s-book_edition">Kitap Kim Tarapyndan Berildi</label>
                <input type="text" class="form-control" name="s-book_edition" id="s-book_edition" placeholder="Kitap Kim Tarapyndan Berildi">
            </div>
            <div class="form-group">
                <label for="s-book_language">Kitap Dili</label>
                <input type="text" class="form-control" name="s-book_language" id="s-book_language" placeholder="Kitap Dili">
            </div>
            <div class="form-group">
                <label for="s-book_subject">Haýsy Predmet</label>
                <input type="text" class="form-control" name="s-book_subject" id="s-book_subject" placeholder="Haýsy Predmet">
            </div>
            <div class="form-group">
                <label for="s-book_class">Synpy</label>
                <select class="form-control" name="s-book_class" id="s-book_class">
                    <option value="0">Synpy</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="s-book_school">Mekdep Ady</label>
                <input type="text" class="form-control" name="s-book_school" id="s-book_school" placeholder="Mekdep Ady">
            </div>
            <div class="form-group">
                <label for="s-book_chapter">Kitap Bölümi</label>
                <input type="text" class="form-control" name="s-book_chapter" id="s-book_chapter" placeholder="Kitap Bölümi">
            </div>
            <div class="form-group">
                <label for="s-book_quantity">Kitap Sany</label>
                <input type="number" class="form-control" name="s-book_quantity" id="s-book_quantity" placeholder="Kitap Sany">
            </div>
            <div class="form-group">
                <label for="s-book_cost">Kitap Bahasy</label>
                <input type="number" min="0" class="form-control" name="s-book_cost" id="s-book_cost" placeholder="Kitap Bahasy Manatda">
            </div>
            <div class="form-group">
                <label for="s-book_number">Kitap Nomeri</label>
                <input type="text" class="form-control" name="s-book_number" id="s-book_number" placeholder="Kitap Nomeri">
            </div>
            <button type="button" class="btn btn-primary" id="search_book" name="search" value="search">Gözle</button>
            <label style="float: right;"><input type="checkbox" name="clear_history" id="clear_history" checked> Öňki görüleni öçür</label>
        </div>
    </div>
</div>