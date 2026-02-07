<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FiorenzoRealProductSeeder extends Seeder
{
    public function run(): void
    {
        $fiorenzo = Brand::where('name', 'FIORENZO')->first();
        if (!$fiorenzo) {
            $fiorenzo = Brand::create(['name' => 'FIORENZO', 'slug' => 'fiorenzo']);
        }

        $products = [
            ["name" => "Gucci Jackie 1961 Mini Handbag", "price" => "3990.00", "image_url" => "images/WOMEN/handbag1.png", "gender" => "women", "category" => "handbags", "description" => "A modern revival of an iconic design, the Gucci Jackie 1961 Mini Handbag brings vintage heritage into a clean, contemporary silhouette. Finished with signature hardware and a refined structure, it transitions effortlessly from day to night with understated luxury.", "stock" => 0],
            ["name" => "Dior Saddle Handbag", "price" => "4290.00", "image_url" => "images/WOMEN/handbag2.png", "gender" => "women", "category" => "handbags", "description" => "Defined by its bold curved silhouette, the Dior Saddle Handbag is instantly recognizable and unapologetically fashion-forward. Crafted to elevate everyday styling with iconic presence and modern confidence.", "stock" => 0],
            ["name" => "Chanel Classic Quilted Handbag", "price" => "4590.00", "image_url" => "images/WOMEN/handbag3.png", "gender" => "women", "category" => "handbags", "description" => "An everlasting symbol of elegance, the Chanel Classic Quilted Handbag embodies timeless sophistication through refined quilting and polished proportions. A true investment piece for every wardrobe.", "stock" => 0],
            ["name" => "Louis Vuitton Keepall Handbag", "price" => "4890.00", "image_url" => "images/WOMEN/handbag4.png", "gender" => "women", "category" => "handbags", "description" => "A legendary design reimagined for modern fashion, blending heritage craftsmanship with bold contemporary styling. Perfect for statement everyday wear.", "stock" => 0],
            ["name" => "Gucci GG Marmont Handbag", "price" => "4290.00", "image_url" => "images/WOMEN/handbag5.png", "gender" => "women", "category" => "handbags", "description" => "Soft leather construction meets iconic Double G hardware, delivering a confident yet effortless luxury statement that works from day to night.", "stock" => 0],
            ["name" => "Dior Signature Leather Handbag", "price" => "3490.00", "image_url" => "images/WOMEN/handbag6.png", "gender" => "women", "category" => "handbags", "description" => "Designed with refined simplicity, this handbag highlights clean lines and premium leather craftsmanship for understated elegance.", "stock" => 0],
            ["name" => "Chanel No.5 Inspired Handbag", "price" => "4590.00", "image_url" => "images/WOMEN/handbag7.png", "gender" => "women", "category" => "handbags", "description" => "Inspired by the legacy of Chanel No.5, this design captures timeless femininity with a modern fashion-forward attitude.", "stock" => 0],
            ["name" => "Louis Vuitton Christopher Handbag", "price" => "4290.00", "image_url" => "images/WOMEN/handbag8.png", "gender" => "women", "category" => "handbags", "description" => "A bold everyday essential combining functional design with strong luxury identity and modern movement.", "stock" => 0],
            ["name" => "Jackie Slim Small Shoulder Bag", "price" => "4890.00", "image_url" => "images/WOMEN/handbag9.png", "gender" => "women", "category" => "handbags", "description" => "Introducing Spring Summer 2026, this refined slim silhouette redefines quiet luxury with a sleek shoulder profile and timeless appeal.", "stock" => 0],
            ["name" => "Crystal Drop Bag Charm", "price" => "390.00", "image_url" => "images/WOMEN/Accessories1.png", "gender" => "women", "category" => "accessories", "description" => "A sleek metallic charm finished with sparkling crystal detailing, designed to elevate handbags and everyday accessories instantly.", "stock" => 0],
            ["name" => "Monogram Zip Card Holder", "price" => "1290.00", "image_url" => "images/WOMEN/Accessories2.png", "gender" => "women", "category" => "accessories", "description" => "Compact and polished, this zip card holder keeps essentials organized while maintaining a refined luxury finish.", "stock" => 0],
            ["name" => "Classic Monogram Cap", "price" => "390.00", "image_url" => "images/WOMEN/Accessories3.png", "gender" => "women", "category" => "accessories", "description" => "A structured monogram cap delivering effortless street-luxury styling for everyday wear.", "stock" => 0],
            ["name" => "Crystal Studded Cap", "price" => "690.00", "image_url" => "images/WOMEN/Accessories4.png", "gender" => "women", "category" => "accessories", "description" => "A statement cap finished with crystal sparkle, adding glam energy to modern street style.", "stock" => 0],
            ["name" => "Crystal Snowflake Drop Earring", "price" => "1490.00", "image_url" => "images/WOMEN/Accessories5.png", "gender" => "women", "category" => "accessories", "description" => "Dazzling drop earrings with icy crystal detailing designed for standout moments.", "stock" => 0],
            ["name" => "Charm Bracelet with Icons", "price" => "1290.00", "image_url" => "images/WOMEN/Accessories6.png", "gender" => "women", "category" => "accessories", "description" => "A luxe charm bracelet featuring playful motifs with premium finish and movement.", "stock" => 0],
            ["name" => "Double-G Keychain Charm", "price" => "390.00", "image_url" => "images/WOMEN/Accessories7.png", "gender" => "women", "category" => "accessories", "description" => "A polished keychain charm adding subtle luxury identity to everyday essentials.", "stock" => 0],
            ["name" => "Tortoise Cat-Eye Sunglasses", "price" => "990.00", "image_url" => "images/WOMEN/Accessories8.png", "gender" => "women", "category" => "accessories", "description" => "Sharp cat-eye frames in tortoise finish delivering confident luxury attitude.", "stock" => 0],
            ["name" => "Gradient Oversized Sunglasses", "price" => "390.00", "image_url" => "images/WOMEN/Accessories9.png", "gender" => "women", "category" => "accessories", "description" => "Oversized gradient frames designed for runway-inspired glamour and presence.", "stock" => 0],
            ["name" => "Blue Lens Aviator Sunglasses", "price" => "1490.00", "image_url" => "images/WOMEN/Accessories10.png", "gender" => "women", "category" => "accessories", "description" => "Modern aviators with cool-toned lenses for clean, elevated everyday styling.", "stock" => 0],
            ["name" => "Pink Oval Sunglasses", "price" => "990.00", "image_url" => "images/WOMEN/Accessories11.png", "gender" => "women", "category" => "accessories", "description" => "Soft pink oval frames offering playful yet refined fashion-forward appeal.", "stock" => 0],
            ["name" => "Logo Baby Pink T-Shirt", "price" => "2490.00", "image_url" => "images/WOMEN/Readytowear1.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A clean logo tee designed for minimal luxury and effortless styling.", "stock" => 0],
            ["name" => "Logo Red Statement T-Shirt", "price" => "1990.00", "image_url" => "images/WOMEN/Readytowear2.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A bold red logo tee that transforms a basic into a confident fashion statement.", "stock" => 0],
            ["name" => "Denim Coat with Hood Detail", "price" => "3190.00", "image_url" => "images/WOMEN/Readytowear3.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A structured denim coat with modern hood detailing, designed for layered city looks.", "stock" => 0],
            ["name" => "Floral Print Shirt Dress", "price" => "3490.00", "image_url" => "images/WOMEN/Readytowear4.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A lightweight floral dress delivering effortless femininity and movement.", "stock" => 0],
            ["name" => "Monogram Long Coat", "price" => "2490.00", "image_url" => "images/WOMEN/Readytowear5.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A full-length monogram coat crafted for timeless luxury and commanding presence.", "stock" => 0],
            ["name" => "Floral Zip Jacket", "price" => "2790.00", "image_url" => "images/WOMEN/Readytowear6.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A bold floral jacket blending sporty energy with premium street styling.", "stock" => 0],
            ["name" => "Black Corset Top", "price" => "3190.00", "image_url" => "images/WOMEN/Readytowear7.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A sculpted corset top designed to flatter with sharp modern structure.", "stock" => 0],
            ["name" => "Black Tie-Neck Blouse", "price" => "1990.00", "image_url" => "images/WOMEN/Readytowear8.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A sleek blouse with tie-neck detail adding soft drama to polished looks.", "stock" => 0],
            ["name" => "Monogram Tie-Neck Blouse", "price" => "3490.00", "image_url" => "images/WOMEN/Readytowear9.png", "gender" => "women", "category" => "ready-to-wear", "description" => "A signature monogram blouse balancing elegance with modern femininity.", "stock" => 0],
            ["name" => "Pink Classic Stiletto Pumps", "price" => "2990.00", "image_url" => "images/WOMEN/Shoes1.png", "gender" => "women", "category" => "shoes", "description" => "Sleek pink pumps with a sharp stiletto heel designed for confident elegance.", "stock" => 0],
            ["name" => "Monogram Knee-High Boots", "price" => "4190.00", "image_url" => "images/WOMEN/Shoes2.png", "gender" => "women", "category" => "shoes", "description" => "A tall statement boot combining iconic pattern with refined silhouette.", "stock" => 0],
            ["name" => "Feather Trim Mule Heels", "price" => "3890.00", "image_url" => "images/WOMEN/Shoes3.png", "gender" => "women", "category" => "shoes", "description" => "High-glam mule heels with soft feather trim and sleek profile.", "stock" => 0],
            ["name" => "Red Patent Stiletto Heels", "price" => "3490.00", "image_url" => "images/WOMEN/Shoes4.png", "gender" => "women", "category" => "shoes", "description" => "Glossy red patent heels delivering bold power dressing energy.", "stock" => 0],
            ["name" => "White Stripe Low-Top Sneakers", "price" => "4490.00", "image_url" => "images/WOMEN/Shoes5.png", "gender" => "women", "category" => "shoes", "description" => "Clean white sneakers with stripe detailing for everyday luxury wear.", "stock" => 0],
            ["name" => "Beige Web-Stripe Sneakers", "price" => "4190.00", "image_url" => "images/WOMEN/Shoes6.png", "gender" => "women", "category" => "shoes", "description" => "Neutral-toned sneakers blending classic design with modern comfort.", "stock" => 0],
            ["name" => "Black Web-Stripe Sneakers", "price" => "2990.00", "image_url" => "images/WOMEN/Shoes7.png", "gender" => "women", "category" => "shoes", "description" => "Sleek black sneakers with web-stripe detail for stealth luxury styling.", "stock" => 0],
            ["name" => "Red Heritage Sneakers", "price" => "3490.00", "image_url" => "images/WOMEN/Shoes8.png", "gender" => "women", "category" => "shoes", "description" => "Bold heritage-inspired sneakers delivering premium street-luxury attitude.", "stock" => 0],
            ["name" => "Monogram Aviator Sunglasses", "price" => "990.00", "image_url" => "images/MEN/Accessoriesm1.png", "gender" => "men", "category" => "accessories", "description" => "Classic aviator sunglasses with monogram-inspired detailing, designed to deliver sharp lines and effortless confidence.", "stock" => 0],
            ["name" => "Gold Frame Aviator Sunglasses", "price" => "1490.00", "image_url" => "images/MEN/Accessoriesm2.png", "gender" => "men", "category" => "accessories", "description" => "Luxury gold-tone aviator sunglasses built for a bold, confident statement.", "stock" => 0],
            ["name" => "Signature Leather Belt", "price" => "390.00", "image_url" => "images/MEN/Accessoriesm3.png", "gender" => "men", "category" => "accessories", "description" => "A smooth leather belt designed for timeless styling and daily versatility.", "stock" => 0],
            ["name" => "Embossed Black Leather Belt", "price" => "990.00", "image_url" => "images/MEN/Accessoriesm4.png", "gender" => "men", "category" => "accessories", "description" => "A modern black belt with embossed signature detailing, crafted for refined everyday styling.", "stock" => 0],
            ["name" => "Embroidered Logo Baseball Cap", "price" => "390.00", "image_url" => "images/MEN/Accessoriesm5.png", "gender" => "men", "category" => "accessories", "description" => "A structured baseball cap with embroidered logo detail, designed to bring street-luxury energy to everyday outfits.", "stock" => 0],
            ["name" => "Reversible Bucket Hat", "price" => "1290.00", "image_url" => "images/MEN/Accessoriesm6.png", "gender" => "men", "category" => "accessories", "description" => "A reversible bucket hat designed for versatility and modern styling.", "stock" => 0],
            ["name" => "Classic Black Bucket Hat", "price" => "1490.00", "image_url" => "images/MEN/Accessoriesm7.png", "gender" => "men", "category" => "accessories", "description" => "A minimal black bucket hat with a clean silhouette for effortless styling.", "stock" => 0],
            ["name" => "Monogram Baseball Cap", "price" => "690.00", "image_url" => "images/MEN/Accessoriesm8.png", "gender" => "men", "category" => "accessories", "description" => "An iconic monogram cap with a structured silhouette and a premium finish.", "stock" => 0],
            ["name" => "Velvet Logo Cap", "price" => "390.00", "image_url" => "images/MEN/Accessoriesm9.png", "gender" => "men", "category" => "accessories", "description" => "A velvet-finish cap with tonal logo detailing, designed to add rich texture and a refined edge.", "stock" => 0],
            ["name" => "Printed Baseball Cap", "price" => "1290.00", "image_url" => "images/MEN/Accessoriesm10.png", "gender" => "men", "category" => "accessories", "description" => "A printed cap featuring signature-inspired motifs for a modern street statement.", "stock" => 0],
            ["name" => "Monogram Trim Cap", "price" => "390.00", "image_url" => "images/MEN/Accessoriesm11.png", "gender" => "men", "category" => "accessories", "description" => "A cap detailed with monogram accents, blending classic branding with a modern wearable finish.", "stock" => 0],
            ["name" => "Leather Keychain Charm", "price" => "1490.00", "image_url" => "images/MEN/Accessoriesm12.png", "gender" => "men", "category" => "accessories", "description" => "A premium leather keychain charm with signature-inspired detailing, designed to bring small luxury to everyday essentials.", "stock" => 0],
            ["name" => "Silver Pendant Necklace", "price" => "990.00", "image_url" => "images/MEN/Accessoriesm13.png", "gender" => "men", "category" => "accessories", "description" => "A minimal silver pendant necklace designed for effortless everyday styling.", "stock" => 0],
            ["name" => "Monogram Crossbody Pouch", "price" => "1290.00", "image_url" => "images/MEN/Accessoriesm14.png", "gender" => "men", "category" => "accessories", "description" => "A compact crossbody pouch with monogram-inspired canvas, designed for modern movement and daily convenience.", "stock" => 0],
            ["name" => "Striped Knit Sweater", "price" => "1990.00", "image_url" => "images/MEN/ReadyToWearMen1.png", "gender" => "men", "category" => "readytowear", "description" => "A luxury knit sweater with signature stripe detailing, designed for warmth without sacrificing style.", "stock" => 0],
            ["name" => "Classic Navy Crew Sweater", "price" => "2790.00", "image_url" => "images/MEN/ReadyToWearMen2.png", "gender" => "men", "category" => "readytowear", "description" => "A classic navy crew sweater crafted from premium fabric for clean everyday elegance.", "stock" => 0],
            ["name" => "Patterned Button Shirt", "price" => "3490.00", "image_url" => "images/MEN/ReadyToWearMen3.png", "gender" => "men", "category" => "readytowear", "description" => "A long-sleeve patterned shirt designed for smart-casual styling with a luxury edge.", "stock" => 0],
            ["name" => "Striped Wool Cardigan", "price" => "3190.00", "image_url" => "images/MEN/ReadyToWearMen4.png", "gender" => "men", "category" => "readytowear", "description" => "A refined wool cardigan with vertical stripe detailing, balancing classic styling with comfortable layering.", "stock" => 0],
            ["name" => "Leather Biker Jacket", "price" => "2790.00", "image_url" => "images/MEN/ReadyToWearMen5.png", "gender" => "men", "category" => "readytowear", "description" => "A premium leather biker jacket crafted for bold, confident styling.", "stock" => 0],
            ["name" => "Zip-Up Knit Jacket", "price" => "2490.00", "image_url" => "images/MEN/ReadyToWearMen6.png", "gender" => "men", "category" => "readytowear", "description" => "A soft knit jacket with a front zip closure, designed as a luxury layering essential.", "stock" => 0],
            ["name" => "Monogram Bomber Jacket", "price" => "1990.00", "image_url" => "images/MEN/ReadyToWearMen7.png", "gender" => "men", "category" => "readytowear", "description" => "A bomber jacket featuring monogram-inspired detailing and a modern silhouette.", "stock" => 0],
            ["name" => "Cream Zip Cardigan", "price" => "3490.00", "image_url" => "images/MEN/ReadyToWearMen8.png", "gender" => "men", "category" => "readytowear", "description" => "A neutral-toned zip cardigan designed for refined casual styling.", "stock" => 0],
            ["name" => "Color Block Sweatshirt", "price" => "1990.00", "image_url" => "images/MEN/ReadyToWearMen9.png", "gender" => "men", "category" => "readytowear", "description" => "A modern color-block sweatshirt blending comfort with luxury styling.", "stock" => 0],
            ["name" => "Textured Leather Shirt", "price" => "2490.00", "image_url" => "images/MEN/ReadyToWearMen10.png", "gender" => "men", "category" => "readytowear", "description" => "A leather-effect shirt with textured finish designed as a statement piece.", "stock" => 0],
            ["name" => "Velvet Zip Jacket", "price" => "2790.00", "image_url" => "images/MEN/ReadyToWearMen11.png", "gender" => "men", "category" => "readytowear", "description" => "A velvet jacket delivering rich texture and a refined street-luxury edge.", "stock" => 0],
            ["name" => "Short Sleeve Pattern Shirt", "price" => "3190.00", "image_url" => "images/MEN/ReadyToWearMen12.png", "gender" => "men", "category" => "readytowear", "description" => "A lightweight patterned shirt for relaxed luxury dressing.", "stock" => 0],
            ["name" => "Quilted Leather Jacket", "price" => "3490.00", "image_url" => "images/MEN/ReadyToWearMen13.png", "gender" => "men", "category" => "readytowear", "description" => "A quilted leather jacket with structured tailoring, built for luxury outerwear impact.", "stock" => 0],
            ["name" => "Monogram Zip Jacket", "price" => "2790.00", "image_url" => "images/MEN/ReadyToWearMen14.png", "gender" => "men", "category" => "readytowear", "description" => "A signature monogram zip jacket combining comfort with iconic identity.", "stock" => 0],
            ["name" => "Web Stripe Sneakers", "price" => "2990.00", "image_url" => "images/MEN/shoesm1.png", "gender" => "men", "category" => "shoes", "description" => "Low-top sneakers featuring signature stripe detailing and a premium finish designed for everyday luxury.", "stock" => 0],
            ["name" => "Canvas Stripe Sneakers", "price" => "4190.00", "image_url" => "images/MEN/shoesm2.png", "gender" => "men", "category" => "shoes", "description" => "Lightweight canvas sneakers with stripe accents, made for breathable comfort and effortless styling.", "stock" => 0],
            ["name" => "White Leather Sneakers", "price" => "3890.00", "image_url" => "images/MEN/shoesm3.png", "gender" => "men", "category" => "shoes", "description" => "Minimal white leather sneakers designed for clean modern looks and daily versatility.", "stock" => 0],
            ["name" => "Beige Leather Sneakers", "price" => "4490.00", "image_url" => "images/MEN/shoesm4.png", "gender" => "men", "category" => "shoes", "description" => "Soft beige leather sneakers with understated luxury styling and a refined silhouette.", "stock" => 0],
            ["name" => "Monogram Low-Top Sneakers", "price" => "2990.00", "image_url" => "images/MEN/shoesm5.png", "gender" => "men", "category" => "shoes", "description" => "Low-top sneakers featuring monogram-inspired accents and premium comfort.", "stock" => 0],
            ["name" => "Classic Brown Sneakers", "price" => "4190.00", "image_url" => "images/MEN/shoesm6.png", "gender" => "men", "category" => "shoes", "description" => "Classic brown sneakers designed for refined casual wear, balancing comfort and premium craftsmanship.", "stock" => 0],
            ["name" => "Tan Leather Sneakers", "price" => "2990.00", "image_url" => "images/MEN/shoesm7.png", "gender" => "men", "category" => "shoes", "description" => "Luxury tan leather sneakers with a sleek silhouette and smooth finish.", "stock" => 0],
            ["name" => "GG Emblem Sneakers", "price" => "3490.00", "image_url" => "images/MEN/shoesm8.png", "gender" => "men", "category" => "shoes", "description" => "Signature sneakers featuring emblem detailing and durable construction.", "stock" => 0],
            ["name" => "Stripe Detail Sneakers", "price" => "4490.00", "image_url" => "images/MEN/shoesm9.png", "gender" => "men", "category" => "shoes", "description" => "Sport-luxury sneakers with stripe detailing and a cushioned sole.", "stock" => 0],
            ["name" => "Technical Runner Sneakers", "price" => "4190.00", "image_url" => "images/MEN/shoesm10.png", "gender" => "men", "category" => "shoes", "description" => "Performance-inspired sneakers built with luxury materials and a modern runner silhouette.", "stock" => 0],
            ["name" => "Monogram Slip-On Loafers", "price" => "2990.00", "image_url" => "images/MEN/shoesm11.png", "gender" => "men", "category" => "shoes", "description" => "Slip-on loafers with monogram-inspired canvas, designed for effortless smart-casual styling.", "stock" => 0],
            ["name" => "Black Leather Loafers", "price" => "3890.00", "image_url" => "images/MEN/shoesm12.png", "gender" => "men", "category" => "shoes", "description" => "Classic black leather loafers crafted with a refined finish for timeless sophistication.", "stock" => 0],
            ["name" => "Horsebit Leather Loafers", "price" => "2990.00", "image_url" => "images/MEN/shoesm13.png", "gender" => "men", "category" => "shoes", "description" => "Heritage-inspired horsebit loafers blending classic identity with modern luxury craftsmanship.", "stock" => 0],
            ["name" => "Monogram Ankle Boots", "price" => "4490.00", "image_url" => "images/MEN/shoesm14.png", "gender" => "men", "category" => "shoes", "description" => "Ankle boots with monogram-inspired detailing and a sturdy sole, designed for sharp seasonal styling.", "stock" => 0],
            ["name" => "Leather Chelsea Boots", "price" => "3890.00", "image_url" => "images/MEN/shoesm15.png", "gender" => "men", "category" => "shoes", "description" => "Classic Chelsea boots crafted from premium leather, designed for clean lines and timeless versatility.", "stock" => 0],
            ["name" => "Shearling Slide Sandals", "price" => "3490.00", "image_url" => "images/MEN/shoesm16.png", "gender" => "men", "category" => "shoes", "description" => "Comfort slide sandals with shearling lining, designed for relaxed luxury and premium comfort.", "stock" => 0],
            ["name" => "Printed Slide Sandals", "price" => "2990.00", "image_url" => "images/MEN/shoesm17.png", "gender" => "men", "category" => "shoes", "description" => "Statement slide sandals with a printed upper and cushioned sole.", "stock" => 0],
            ["name" => "Web Stripe Slides", "price" => "4190.00", "image_url" => "images/MEN/shoesm18.png", "gender" => "men", "category" => "shoes", "description" => "Iconic slide sandals featuring signature stripe branding for a clean luxury statement.", "stock" => 0],
            ["name" => "Monogram Trainer Sneakers", "price" => "4490.00", "image_url" => "images/MEN/shoesm19.png", "gender" => "men", "category" => "shoes", "description" => "Luxury trainers combining monogram-inspired canvas with an athletic silhouette for modern street styling.", "stock" => 0],
            ["name" => "Classic Logo Loafers", "price" => "3490.00", "image_url" => "images/MEN/shoesm20.png", "gender" => "men", "category" => "shoes", "description" => "Minimal loafers finished with subtle logo detailing, designed for timeless style and versatility.", "stock" => 0],
            ["name" => "Monogram Shoulder Bag", "price" => "4290.00", "image_url" => "images/MEN/bagm1.png", "gender" => "men", "category" => "bag", "description" => "A compact shoulder bag crafted from monogram-inspired canvas for everyday luxury.", "stock" => 0],
            ["name" => "Leather Crossbody Bag", "price" => "4590.00", "image_url" => "images/MEN/bagm2.png", "gender" => "men", "category" => "bag", "description" => "A structured leather crossbody bag designed for modern utility and refined everyday styling.", "stock" => 0],
            ["name" => "Printed Messenger Bag", "price" => "3490.00", "image_url" => "images/MEN/bagm3.png", "gender" => "men", "category" => "bag", "description" => "A messenger bag featuring bold print and an adjustable strap.", "stock" => 0],
            ["name" => "Black Stripe Crossbody", "price" => "4890.00", "image_url" => "images/MEN/bagm4.png", "gender" => "men", "category" => "bag", "description" => "A black leather crossbody bag finished with signature stripe detailing for a clean, recognizable look.", "stock" => 0],
            ["name" => "Technical Backpack", "price" => "3490.00", "image_url" => "images/MEN/bagm5.png", "gender" => "men", "category" => "bag", "description" => "A lightweight technical backpack designed for travel, daily movement, and all-day comfort.", "stock" => 0],
            ["name" => "Classic Leather Backpack", "price" => "4590.00", "image_url" => "images/MEN/bagm6.png", "gender" => "men", "category" => "bag", "description" => "A classic leather backpack crafted with refined structure and a premium finish.", "stock" => 0],
            ["name" => "Monogram Backpack", "price" => "4290.00", "image_url" => "images/MEN/bagm7.png", "gender" => "men", "category" => "bag", "description" => "An iconic monogram-inspired backpack with a spacious interior and modern design.", "stock" => 0],
            ["name" => "Canvas Stripe Backpack", "price" => "3990.00", "image_url" => "images/MEN/bagm8.png", "gender" => "men", "category" => "bag", "description" => "A canvas backpack with stripe detailing, combining sporty energy with a premium finish.", "stock" => 0],
            ["name" => "Monogram Belt Bag", "price" => "4890.00", "image_url" => "images/MEN/bagm9.png", "gender" => "men", "category" => "bag", "description" => "A hands-free belt bag designed for modern street-luxury styling and everyday movement.", "stock" => 0],
            ["name" => "Leather Backpack with Stripe", "price" => "4590.00", "image_url" => "images/MEN/bagm10.png", "gender" => "men", "category" => "bag", "description" => "A premium leather backpack finished with signature stripe detailing, designed for strong everyday presence.", "stock" => 0],
        ];

        foreach ($products as $data) {
            // Map category string to Category model
            $catSlug = $data['category'];
            if ($catSlug === 'handbags')
                $catSlug = 'bags';
            if ($catSlug === 'ready-to-wear')
                $catSlug = 'ready-to-wear';

            $category = Category::where('slug', $catSlug)->first();
            if (!$category) {
                $category = Category::create(['name' => ucfirst($catSlug), 'slug' => $catSlug]);
            }

            Product::updateOrCreate(
                ['slug' => Str::slug($data['name'] . '-' . $data['gender'])],
                [
                    'name' => $data['name'],
                    'category_id' => $category->id,
                    'brand_id' => $fiorenzo->id,
                    'price' => $data['price'],
                    'stock' => 10,
                    'description' => $data['description'],
                    'image_url' => $data['image_url'],
                    'gender' => $data['gender'],
                    'category' => $data['category'] // Keep original string for sidebar logic
                ]
            );
        }
    }
}
