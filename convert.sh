
rm -rf assets/images/compressed/
mkdir -p assets/images/compressed

files=$(find assets/images -maxdepth 1 -type f \( -iname \*.jpg -o -iname \*.png \) -printf "%f\n");
# echo $files;
for file in $files
do
	echo "ottimizzazione di ${file}";
	file_no_extension=$(echo $file | cut -f 1 -d '.');
	convert assets/images/${file} -strip -interlace Plane -quality 80 -resize 200x200 assets/images/compressed/200_${file_no_extension}.jpg
	convert assets/images/${file} -strip -interlace Plane -quality 80 -resize 500x500 assets/images/compressed/500_${file_no_extension}.jpg
	convert assets/images/${file} -strip -interlace Plane -quality 80 -resize 1000x1000 assets/images/compressed/1000_${file_no_extension}.jpg
	convert assets/images/${file} -strip -interlace Plane -quality 80 assets/images/compressed/full_${file_no_extension}.jpg
done

# compressione Css
yui-compressor assets/fabstyle.css > assets/fabstyle.min.css