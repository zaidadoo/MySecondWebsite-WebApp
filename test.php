<?php 

if(is_writeable("../profile")){
	echo "works";
} else {
	echo "nope";
}