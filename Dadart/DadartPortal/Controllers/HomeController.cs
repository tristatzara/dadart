using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Dadart.BLL.Model;
using System.Web.Mvc;
using System.Threading.Tasks;
using Dadart.BLL.Manager;
using Dadart.BLL.Model.Catalog;
using DadartPortal.Models;

namespace DadartPortal.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            ViewBag.Quote =
                "\" La magia di una parola - DADA - che ha messo i giornalisti davanti alla porta di un mondo imprevisto, non ha per noi alcuna importanza\" \n Tristan Tzara, Manifesto Dada 1918".Replace("\n", Environment.NewLine);
            var viewModel = new HomeViewModel();
            var manager = new CatalogManager();
            var products = manager.GetAllProduct().OrderBy(productDate => productDate.Date.Ticks);
            viewModel.ProdictList.Add(products.LastOrDefault());
            viewModel.ProdictList.Add(products.ElementAt(products.Count()-2));
            foreach (var product in viewModel.ProdictList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }
            viewModel.TodayProduct = viewModel.ProdictList.ElementAt(new Random().Next(0, viewModel.ProdictList.Count));
            viewModel.TodayArtist = manager.GetArtist(viewModel.TodayProduct.ArtistId.ToString());
            return View(viewModel);
        }

        public ActionResult Grafiche()
        {
            ViewBag.Quote = "\" Imporre il proprio A.B.C. è una cosa naturale, \n e perciò deplorevole.\" \n Tristan Tzara, Manifesto Dada 1918 ".Replace("\n", Environment.NewLine);


            var viewModel = new CatalogViewModel();
            var manager = new CatalogManager();
            viewModel.CategoryList = manager.GetAllCategory("Grafiche");
            var products = new List<Product>();
            foreach (var category in viewModel.CategoryList)
            {
                foreach(var product in manager.GetAllCategoryProduct(category.CategoryId.ToString()))
                products.Add(product);
            }
             products = products.OrderBy(productDate => productDate.Date.Ticks).ToList();
            
            viewModel.ProductList.Add(products.LastOrDefault());
            viewModel.ProductList.Add(products.ElementAt(products.Count - 2));
            foreach (var product in viewModel.ProductList)
            {
                viewModel.ArtistList.Add(manager.GetArtist(product.ArtistId.ToString()));
            }

            viewModel.TodayProduct = products.ElementAt(new Random().Next(0, products.Count));
            viewModel.TodayArtist = manager.GetArtist(viewModel.TodayProduct.ArtistId.ToString());

            return View(viewModel);
        }

        public ActionResult Sculture()
        {
            ViewBag.Quote =
                "\" L’arte è una cosa privata, l’artista la fa per se stesso; un'opera comprensibile è un prodotto da giornalisti. \" \nTristan Tzara, La spontaneità dadaista 1918"
                    .Replace("\n", Environment.NewLine);


            return View();
        }

        public ActionResult Disegni()
        {
            ViewBag.Quote =
                "\"La compietezza dell'individuo si afferma in seguito a uno stato di follia...\" \nTristan Tzara, La spontaneità dadaista 1918"
                    .Replace("\n", Environment.NewLine);


            return View();
        }

        public ActionResult Fotografia()
        {
            ViewBag.Quote =
                "\"...tutto è simile a ciò ch'è dissimile\" \nTristan Tzara, Manifesto sull'amore debole e l'amore amaro 1918"
                    .Replace("\n", Environment.NewLine);
            return View();
        }


        public void Test(CatalogModel c)
        {

            
        }
    }
}