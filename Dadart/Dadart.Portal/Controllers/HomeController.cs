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
            var viewModel = new IndexViewModel();
            viewModel.ProductList = manager.GetAllProduct();
            foreach(var product in viewModel.ProductList)
            {
                var artist = manager.GetArtist(product.ArtistId.ToString());
                viewModel.ArtistList.Add(artist);
            }

            return View(viewModel);
        }

        public ActionResult Grafiche()
        {
            ViewBag.Quote = "\"Imporre il proprio A.B.C.è una cosa naturale, \n e perciò deplorevole.\" \n Tristan Tzara, Manifesto Dada 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            var categories = manager.GetAllCategory("Grafihce");
            foreach(var category in categories)
            {
                var productManager = new ProductManager();
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    viewModel.ProductList.Add(product);
                    viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
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
            var viewModel = new IndexViewModel();
            var categories = manager.GetAllCategory("Sculture");
            foreach (var category in categories)
            {
                var productManager = new ProductManager();
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    viewModel.ProductList.Add(product);
                    viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
                }
            }
            return View(viewModel);
        }

        public ActionResult Disegni()
        {
            ViewBag.Quote =
                "\"La compietezza dell'individuo si afferma in seguito a uno stato di follia...\" Tristan Tzara, La spontaneità dadaista 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            var categories = manager.GetAllCategory("Disegni");
            foreach (var category in categories)
            {
                var productManager = new ProductManager();
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    viewModel.ProductList.Add(product);
                    viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
                }
            }
            return View(viewModel);
        }

        public ActionResult Fotografia()
        {
            ViewBag.Quote =
                "\"...tutto è simile a ciò ch'è dissimile.\" Tristan Tzara, Manifesto sull'amore debole e l'amore amaro 1918";
            var manager = new CatalogManager();
            var viewModel = new IndexViewModel();
            var categories = manager.GetAllCategory("Fotografia");
            foreach (var category in categories)
            {
                var productManager = new ProductManager();
                var productList = manager.GetAllCategoryProduct(category.Name);
                foreach (var product in productList)
                {
                    viewModel.ProductList.Add(product);
                    viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
                }
            }
            return View(viewModel);
        }
    }
}