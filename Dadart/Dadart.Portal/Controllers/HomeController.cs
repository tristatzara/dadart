using Dadart.BLL.Manager;
using Dadart.Portal.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            ViewBag.Quote =
                "\"La magia di una parola - DADA - che ha messo i giornalisti davanti alla porta di un mondo imprevisto, non ha per noi alcuna importanza\" \n Tristan Tzara, Manifesto Dada 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var list = manager.GetAllProduct();
            foreach(var product in list)
            {
                var productView = new ProductView()
                {
                    Product = product,
                    Artist = manager.GetArtist(product.ArtistId.ToString())
                };                                
                viewModel.ProductList.Add(productView);
            }

            return View(viewModel);
        }

        public ActionResult Grafiche()
        {
            ViewBag.Quote = "\"Imporre il proprio A.B.C.è una cosa naturale, \n e perciò deplorevole.\" \n Tristan Tzara, Manifesto Dada 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var categories = manager.GetAllCategory("graphics");
            foreach(var category in categories)
            {
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    var productView = new ProductView()
                    {
                        Product = product,
                        Artist = manager.GetArtist(product.ArtistId.ToString())
                    };
                    viewModel.ProductList.Add(productView);
                }
            }
            return View(viewModel);
        }

        public ActionResult Sculture()
        {
            ViewBag.Message = "Your contact page.";
            ViewBag.Quote =
                "\"L’arte è una cosa privata, l’artista la fa per se stesso; un'opera comprensibile è un prodotto da giornalisti\" Tristan Tzara, La spontaneità dadaista 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var categories = manager.GetAllCategory("Sculture");
            foreach (var category in categories)
            {
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    var productView = new ProductView()
                    {
                        Product = product,
                        Artist = manager.GetArtist(product.ArtistId.ToString())
                    };
                    viewModel.ProductList.Add(productView);
                }
            }
            return View(viewModel);
        }

        public ActionResult Disegni()
        {
            ViewBag.Quote =
                "\"La compietezza dell'individuo si afferma in seguito a uno stato di follia...\" Tristan Tzara, La spontaneità dadaista 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var categories = manager.GetAllCategory("Disegni");
            foreach (var category in categories)
            {                
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    var productView = new ProductView()
                    {
                        Product = product,
                        Artist = manager.GetArtist(product.ArtistId.ToString())
                    };
                    viewModel.ProductList.Add(productView);
                }
            }
            return View(viewModel);
        }

        public ActionResult Fotografia()
        {
            ViewBag.Quote =
                "\"...tutto è simile a ciò ch'è dissimile.\" Tristan Tzara, Manifesto sull'amore debole e l'amore amaro 1918";
            var manager = new CatalogManager();
            var viewModel = new MainViewModel();
            viewModel.ProductList = new List<ProductView>();
            var categories = manager.GetAllCategory("Fotografia");
            foreach (var category in categories)
            {                
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    var productView = new ProductView()
                    {
                        Product = product,
                        Artist = manager.GetArtist(product.ArtistId.ToString())
                    };
                    viewModel.ProductList.Add(productView);
                }
            }
            return View(viewModel);
        }
    }
}